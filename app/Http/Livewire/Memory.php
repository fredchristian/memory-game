<?php

namespace App\Http\Livewire;

use App\Enums\CardEnum;
use App\Enums\DifficultyEnum;
use Livewire\Component;

class Memory extends Component
{
    public $difficulty;

    public ?string $backface;

    public array $cards = [];

    public array $compare_two_cards = [];

    public int $delay = 2000;

    public int $attempts = 0;

    public function mount(): void
    {
        $this->difficulty = null;

        $this->backface = CardEnum::default();

        $this->attempts = 0;
    }

    public function init(): void
    {
        $this->setCards($this->difficulty->tiles());
    }

    public function setDifficulty(string $value): void
    {
        $this->difficulty = DifficultyEnum::select($value);

        $this->init();
    }

    public function getDifficulties(): array
    {
        return DifficultyEnum::cases();
    }

    private function setCards(int $tiles = 4): void
    {
        $cards = CardEnum::cases();

        $selection = collect($cards)
            ->random($tiles <= count($cards) ? $tiles : count($cards))
            ->map(function ($item) {
                return [
                    'card' => $item->name,
                    'name' => $item->value,
                    'image' => $item->image(),
                    'visible' => false,
                    'win' => false,
                ];
            })
            ->toArray();

        $this->cards = collect(array_merge($selection, $selection))
            ->shuffle()
            ->toArray();
    }

    public function flip(int $key): void
    {
        if (! $this->cards[$key]['visible']) {
            data_set($this->cards[$key], 'visible', true);

            $this->compare_two_cards[] = [
                'id' => $key,
                'name' => $this->cards[$key]['name'],
                'image' => $this->cards[$key]['image'],
            ];

            $this->compare();
        }
    }

    private function compare(): void
    {
        if (count($this->compare_two_cards) === 2) {
            $this->dispatchBrowserEvent('disable');

            $this->areSimilar($this->compare_two_cards)
                ? $this->match()
                : $this->rollback();
        }
    }

    private function areSimilar(array $items): bool
    {
        return $items[0]['name'] == $items[1]['name'];
    }

    private function match(): void
    {
        foreach ($this->compare_two_cards as $card) {
            data_set($this->cards[$card['id']], 'win', true);
        }

        $this->dispatchBrowserEvent(
            'notification', 
            [
                'title' => collect([__('Félicitation'), __('Génial'), __('Super'), __('Trop fort'), __('Wouaf!')])->random(),
                'message' => __('Tu as trouvé :character!', ['character' => $this->compare_two_cards[0]['name']]),
                'image' => $this->compare_two_cards[0]['image'],
            ]);

        unset($this->compare_two_cards);

        $this->emit('confetti');

        $this->attempts++;

        $this->checkIfGameIsOver() 
            ? $this->gameOver()
            : $this->dispatchBrowserEvent('enable');
    }

    public function checkIfGameIsOver(): bool 
    {
        $cards = collect($this->cards);

        return $cards->where('win', 1)->count() === $cards->count();
    }

    public function gameOver(): void
    {
        $this->emit('fireworks');
        
        $this->dispatchBrowserEvent('gameover');
    }

    private function rollback(): void
    {
        foreach ($this->compare_two_cards as $card) {
            data_set($this->cards[$card['id']], 'visible', false);
        }

        unset($this->compare_two_cards);

        $this->dispatchBrowserEvent('rollback');

        $this->attempts++;
    }

    public function restart(): void
    {
        $this->dispatchBrowserEvent('restart');

        $this->reset(['cards', 'compare_two_cards', 'attempts']);

        $this->init();
    }

    public function cancel(): void
    {
        $this->reset(['difficulty', 'cards', 'compare_two_cards', 'attempts']);

        $this->mount();
    }

    public function currentScore(): int
    {
        return collect($this->cards)->sum('win') / 2;
    }

    public function totalScore(): int
    {
        return $this->difficulty?->tiles() ?? 0;
    }
}

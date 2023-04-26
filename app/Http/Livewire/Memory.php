<?php

namespace App\Http\Livewire;

use App\Enums\CardEnum;
use Livewire\Component;

class Memory extends Component
{
    public array $cards = [];

    public string $default_card = '';

    public array $compare_two_cards = [];

    public int $limit = 4;

    public int $delay = 2000;

    public function mount(): void
    {
        $this->cards = $this->generate($this->limit);
        $this->default_card = CardEnum::default_image();
    }

    private function random(?int $numbers = 4): array
    {
        $cards = CardEnum::cases();

        return collect($cards)
            ->random($numbers <= count($cards) ? $numbers : count($cards))
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
    }

    public function generate(?int $numbers = 4): array
    {
        $cards = $this->random($numbers);

        return collect(array_merge($cards, $cards))
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
            ];

            $this->compare();
        }
    }

    private function compare(): void
    {
        if (count($this->compare_two_cards) === 2) {
            $this->are_similar($this->compare_two_cards)
                ? $this->match()
                : $this->rollback();
        }
    }

    private function are_similar(array $items): bool
    {
        return $items[0]['name'] == $items[1]['name'];
    }

    private function match(): void
    {
        foreach ($this->compare_two_cards as $card) {
            data_set($this->cards[$card['id']], 'win', true);
        }

        unset($this->compare_two_cards);

        $this->emit('confetti');
    }

    private function rollback(): void
    {
        foreach ($this->compare_two_cards as $card) {
            data_set($this->cards[$card['id']], 'visible', false);
        }

        unset($this->compare_two_cards);

        $this->dispatchBrowserEvent('rollback');
    }

    public function render()
    {
        return view('index');
    }
}

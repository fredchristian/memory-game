@props([
    'currentScore' => $currentScore,
    'totalScore' => $totalScore,
    'attempts' => $attempts
])

<div class="flex items-center justify-center space-x-4 text-white">
    <img src="{{ Vite::asset('resources/images/biscuit.png') }}" class="inline-block h-12 drop-shadow-xl" alt="{{ __('Biscuit pour chien') }}">
    <div class="space-y-0.5">
        <div class="block">
            <span class="inline-block text-5xl font-sigmar leading-none">
                {{ $this->currentScore() }}
            </span>

            <span class="inline-block text-sm font-sigmar">
                / {{ $this->totalScore() }}
            </span>
        </div>

        <span class="block text-xs text-white/50 leading-none">
            {{ __('en :number essais', ['number' => $attempts]) }}
        </span>
    </div>
</div>

<x-layouts.wrapper :overlay="! is_null($this->difficulty)">
    <div 
        x-data="{ play: false, disabled: false }"
        @disable.window="disabled = true"
        @enable.window="disabled = false"
        id="confetti"
        class="mx-auto container space-y-16 px-6 py-8 text-white"
    >
        <div 
            x-show="play" 
            x-transition:enter.scale.80
            x-transition:enter.delay.300ms 
            x-cloak 
            class="flex items-center justify-between">
            <x-menu.score 
                :currentScore="$this->currentScore()"
                :totalScore="$this->totalScore()"
                :attempts="$attempts" />

            <div 
                @click="$wire.cancel(), play = false"
                class="inline-flex items-center space-x-2"
                >
                <span class="inline-block font-sigmar">{{ __('Abandonner') }}</span>
                <x-phosphor-x-bold class="h-5 w-5" />
            </div>
        </div>

        <div>
            {{-- Sélection de la difficulté du jeu --}}
            <div 
                x-show="! play" 
                x-transition:enter.scale.80 
                class="space-y-16">
                <div class="flex flex-col items-center justify-center space-y-4 pt-16 lg:pt-72">
                    <div>
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" class="h-36 w-auto">
                    </div>
                </div>

                <nav class="flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center justify-center space-y-4">
                        @foreach($this->getDifficulties() as $difficulty)
                            <x-buttons.difficulty :difficulty="$difficulty" />
                        @endforeach
                    </div>
                </nav>
            </div>
            
            {{-- Lancement d'une partie --}}
            <div x-show="play" 
                x-transition:enter.scale.80 
                x-transition:enter.delay.300ms
                x-cloak>
                <div
                    x-data="{ disabled: false }"
                    @disable.window="disabled = true"
                    @enable.window="disabled = false"
                    >
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach($cards as $key => $card)
                            <x-cards :key="$key" :card="$card" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.wrapper>

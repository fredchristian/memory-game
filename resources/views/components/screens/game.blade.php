<div 
    x-show="play" 
    x-transition:enter.scale.80 
    x-transition:enter.delay.300ms 
    x-cloak
    class="flex-1 flex flex-col space-y-8">

    <x-menu />
        
    <div class="flex-1 flex content-center">
        <div 
            x-show="! gameover" 
            x-cloak 
            class="w-full grid grid-cols-2 lg:grid-cols-4 gap-8 content-center transition delay-1000 duration-500">
            @foreach($this->cards as $key => $card)
                <x-cards :$key :$card />
            @endforeach
        </div>

        <div 
            x-show="gameover" 
            x-cloak 
            class="w-full min-h-full flex flex-col items-center justify-center space-y-16">
                <div class="text-center space-y-2">
                    <h1 class="text-8xl font-sigmar text-sky-500 drop-shadow-lg stroke">
                        {{ __('Bravo') }}
                    </h1>

                    <p class="font-sigmar text-3xl  drop-shadow-md max-w-lg">
                        {{ __('Tu as trouvé tous les personnages') }}
                    </p>
                </div>

                <x-buttons.restart />
        </div>
    </div>
</div>

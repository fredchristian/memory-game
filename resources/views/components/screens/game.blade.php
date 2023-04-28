<div 
    x-show="play" 
    x-transition:enter.scale.80 
    x-transition:enter.delay.300ms 
    x-cloak
    class="flex-1 flex flex-col space-y-8">

    <x-menu />
        
    <div
        x-data="{ disabled: false }"
        @disable.window="disabled = true"
        @enable.window="disabled = false"
        class="flex-1 flex content-center"
        >
        <div class="w-full grid grid-cols-2 lg:grid-cols-4 gap-8 content-center transition delay-1000  duration-500">
            @foreach($this->cards as $key => $card)
                <x-cards :$key :$card />
            @endforeach
        </div>
    </div>
</div>
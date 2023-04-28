<div {{  $attributes->merge(['class' => 'isolate -space-x-2 drop-shadow-xl overflow-hidden px-6 py-4 cursor-default']) }}>
    @foreach($this->characters() as $character)
        <div class="relative z-20 overflow-hidden h-12 w-12 rounded-full border-4 border-sky-700 ring-4 ring-yellow-300 bg-sky-500 hover:scale-125 duration-300">
            @if(! $character['win'])
                <div class="absolute z-10 flex items-center justify-center h-full w-full bg-sky-500/60 backdrop-blur-sm">
                    <span class="text-2xl font-sigmar">
                        ?
                    </span>
                </div>
            @endif
            
            <img class="relative z-0 inline-block object-cover object-top scale-150 mt-1.5" src="{{ $character['image'] }}" alt="{{ $character['name'] }}">
        </div>
    @endforeach
  
</div>
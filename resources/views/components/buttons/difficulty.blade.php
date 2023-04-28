@props([
    'difficulty' => $difficulty,
])

<button @click="$wire.setDifficulty(@js($difficulty->value)), play = true" 
    @class([
        'relative overflow-hidden w-full border-4 border-sky-700 ring-4 ring-transparent hover:ring-yellow-300 bg-sky-500 px-12 py-3 rounded-full duration-300 hover:scale-125 group',
        collect(['hover:-rotate-1', 'hover:rotate-1', 'hover:-rotate-3', 'hover:rotate-3',])->random(),
    ])>
    
    <x-images.paw class="h-12 w-12 -rotate-12 scale-125 absolute left-4 z-0 fill-sky-900/10 hidden group-hover:block" />

    <div class="relative z-10 space-y-1">
        <span class="block font-sigmar group-hover:drop-shadow-md text-lg leading-none">
            {{ $difficulty->name() }}
        </span>

        <span class="block text-xs text-sky-200 leading-none">
            {{ __(':number cartes', ['number' => $difficulty->tiles() * 2]) }}
        </span>
    </div>
</button>

<x-layouts.wrapper>
    <div 
        @disable.window="disabled = true"
        @enable.window="disabled = false"
        id="confetti"
        class="min-h-screen flex flex-col mx-auto container py-8 px-6 text-white"
    >
        {{-- Sélection de la difficulté du jeu --}}
        <x-screens.difficulty />
        
        {{-- Lancement d'une partie --}}
        <x-screens.game  />
    </div>
</x-layouts.wrapper>

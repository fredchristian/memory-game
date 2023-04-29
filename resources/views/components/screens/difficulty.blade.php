<div 
    x-show="! play" 
    x-transition:enter.scale.80 x-cloak
    class="flex-1 flex flex-col justify-center space-y-12">
    <div class="flex flex-col items-center justify-center space-y-8">
        <img 
            src="{{ Vite::asset('resources/images/logo.png') }}" 
            class="h-36 w-auto" 
            alt="{{ __('Ecusson de la Pat\'Patrouille') }}">

        <nav class="flex flex-col items-center justify-center space-y-4">
            @foreach($this->getDifficulties() as $difficulty)
                <x-buttons.difficulty :$difficulty />
            @endforeach
        </nav>
    </div>
</div>

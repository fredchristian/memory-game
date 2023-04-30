<button 
    @click="$wire.cancel(), play = false, disabled = false, gameover = false"
    class="inline-flex items-center space-x-2 cursor-pointer"
    data-umami-event="quit">
    <span class="inline-block font-sigmar">
        {{ __('Quitter') }}
    </span>
    
    <x-phosphor-x-bold class="h-5 w-5" />
</button>

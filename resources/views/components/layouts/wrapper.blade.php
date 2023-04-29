<div 
    x-data="{ play: false, disabled: false, gameover: false }"
    :class="play 
        ? 'bg-black/80 backdrop-blur-md'
        : 'bg-gradient-to-b from-transparent from-10% via-black/50 via-40% to-neutral-900' 
    "
    class="min-h-screen w-full">
    {{ $slot }}
</div>

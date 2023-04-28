<div 
    x-show="!visible" 
    @class([
        'border-2 rounded-xl p-3 duration-500 bg-white',
        collect(['-rotate-1', 'rotate-1', '-rotate-3', 'rotate-3'])->random()
    ])
    :class="disabled || '{{ collect(['hover:-rotate-1', 'hover:rotate-1', 'hover:-rotate-3', 'hover:rotate-3'])->random() }} hover:scale-105 hover:shadow-2xl'" 
    :class="visibility || 'opacity-0'"
    cursor-pointer'">
    <div class="w-full flex items-center justify-center h-32 bg-sky-500 rounded-md">
        <img src="{{ $this->backface }}" class="h-24 w-auto object-contain drop-shadow-lg">
    </div>
</div>

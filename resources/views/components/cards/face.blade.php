@aware([
    'card' => $card,
])

<div 
    x-show="visible" 
    x-transition:enter="transition ease-out duration-500 [backface-visibility:hidden]"
    x-transition:enter-start="[transform:rotateY(-180deg)]"
    x-transition:enter-end="[transform:rotateY(0deg)]"
    class="border-2 rounded-xl p-4 bg-white">
    <div class="relative w-full flex items-center justify-center h-32 rounded-md">
        <div 
            x-show="wrong"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-150"
            x-transition:enter-end="opacity-100 scale-100"
            class="absolute left-2">
            <x-images.paw class="h-32 w-32 -rotate-12 fill-red-600/60" />
        </div>

        <img src="{{ $card['image'] }}" class="h-full w-auto object-contain">
    </div>
</div>

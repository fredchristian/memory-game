@aware([
    'card' => $card,
])

<div 
    x-show="visible" 
    x-transition:enter="transition ease-out duration-500 [backface-visibility:hidden]"
    x-transition:enter-start="[transform:rotateY(-180deg)]"
    x-transition:enter-end="[transform:rotateY(0deg)]"
    class="border-2 rounded-xl p-4 bg-white">
    <div class="w-full flex items-center justify-center h-32 rounded-md">
        <img src="{{ $card['image'] }}" class="h-full w-auto object-contain">
    </div>
</div>

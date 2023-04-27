@props([
    'overlay' => (bool) false,
])

<div @class([
    'min-h-screen w-full',
    'bg-gradient-to-b from-transparent from-10% via-black/50 via-40% to-neutral-900' => ! $overlay,
    'bg-black/80 backdrop-blur-md' => $overlay,
])>
    {{ $slot }}
</div>

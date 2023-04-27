@props([
    'key' => $key,
    'card' => $card,
])

<button 
    x-data="{ visible: false }" 
    :disabled="disabled"
    @click="$wire.flip(@js($key)), visible = true"
    @rollback.window="@js(!$card['win']) ? setTimeout(function() { visible = false, disabled = false }, @js($this->delay)) : null"
    @restart.window="visible = false"
    x-cloak >
    
    <x-cards.backface />
    <x-cards.face :card="$card" />
</button>

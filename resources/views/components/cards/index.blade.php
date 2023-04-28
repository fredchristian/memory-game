@props([
    'key' => $key,
    'card' => $card,
])

<button 
    x-data="{ visible: false, wrong: false }" 
    :disabled="disabled"
    @click="$wire.flip(@js($key)), visible = true"
    @rollback.window="@js(!$card['win']) && (wrong = true, setTimeout(function() { visible = false, disabled = false, wrong = false }, @js($this->delay)))"
    @restart.window="visible = false"
    x-cloak >
    
    <x-cards.backface />
    <x-cards.face :$card />
</button>

<div id="confetti" class="space-y-16"> 
    <div class="grid grid-cols-4 gap-16">    
        @foreach($cards as $key => $item)
            <div class="border-2 rounded-lg shadow-neutral-300 duration-300 w-72 h-96 flex items-center justify-center overflow-hidden cursor-pointer animate__animated"
                x-data="{ visible: @js($item['visible']) }"
                @click="$wire.flip(@js($key)), visible = true"
                @rollback.window="if(@js(! $item['win'])) { setTimeout(function() { visible = false }, @js($delay)) }"
                :class="visible ? 'animate__flipInY' : ''"
                >
                <div x-show="! visible">
                    <span class="flex items-center justify-center border-8 border-white w-72 h-96 text-8xl font-black text-neutral-500 bg-gradient-to-b from-red-100 to-red-300 to-50%">
                        <img src="{{ $default_card }}" class="w-40 h-96 object-contain"> 
                    </span>
                </div>
                
                <div x-show="visible">
                    <img src="{{ $item['image'] }}" class="w-72 h-96 object-contain"> 
                </div>
            </div>
        @endforeach
    </div>
</div>

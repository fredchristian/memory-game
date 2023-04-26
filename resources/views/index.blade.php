<div class="h-full flex flex-cols items-center justify-center">
    <div class="w-full space-y-16">
        <div class="flex items-center justify-between space-x-8">
            <div x-data @click="$wire.restart()">
                nouvelle partie
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex-1 border border-neutral-200 rounded-md px-8 py-4 space-y-2">
                    <div class="flex items-baseline justify-center space-x-4">
                        <span class="text-6xl font-black">{{ $attempts }}</span>
                    </div>
                    <div class="font-medium text-neutral-800">coups joués</div>
                </div>

                <div class="flex-1 border border-neutral-200 rounded-md px-8 py-4 space-y-2">
                    <div class="flex items-baseline justify-center space-x-2">
                        <span class="text-6xl font-black">{{ $this->currentScore() }}</span>
                        <span class="text-lg text-neutral-500 font-bold">/ {{ $this->totalScore() }}</span>
                    </div>

                    <h1 class="font-medium text-neutral-800">personnages</h1>
                </div>
            </div>
        </div>

        <div id="confetti"
            x-data="{ disabled: false }"
            @disable.window="disabled = true"
            @enable.window="disabled = false"
            >
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-16">
                @foreach($cards as $key => $card)
                    <button 
                        x-data="{ visible: false }" 
                        :disabled="disabled"
                        @click="$wire.flip(@js($key)), visible = true"
                        @rollback.window="@js(!$card['win']) ? setTimeout(function() { visible = false, disabled = false }, @js($delay)) : null"
                        @restart.window="visible = false"
                        class="cursor-pointer"
                        x-cloak
                    >
                        <div x-show="!visible" class="border-2 rounded-xl p-4 hover:-rotate-3 hover:scale-105 duration-300">
                            <div class="w-full flex items-center justify-center h-64 bg-sky-500 rounded-md">
                                <img src="{{ $default_card }}" class="h-32 w-auto object-contain drop-shadow-lg">
                            </div>
                        </div>

                        <div x-show="visible" class="border-2 rounded-xl p-4">
                            <div class="w-full flex items-center justify-center h-64 rounded-md">
                                <img src="{{ $card['image'] }}" class="h-full w-auto object-contain">
                            </div>
                        </div>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div  
    x-data="{ open : false, image: '', title : '', message : '' }"
    x-show="open" 
    x-cloak
    x-transition:enter="ease-out duration-500"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
    @notification.window="
        open = true;
        image = event.detail.image;
        title = event.detail.title;
        message = event.detail.message;
        setTimeout(function() { open = false }, 4000);
    " class="absolute flex justify-center mt-10 md:mt-12 w-full md:w-auto md:max-w-lg px-4">
        
    <div class="flex items-center space-x-8 pl-8 pr-16 py-4 bg-black/90 backdrop-blur drop-shadow-lg rounded-full w-full">
        <img :src="image" class="inline-block h-10 w-10 rounded-full object-cover object-top scale-150">
        
        <div>
            <div class="text-gray-400 text-sm font-medium" x-text="title"></div>
            <div class="text-white font-medium" x-text="message"></div>
        </div>
    </div>
</div>

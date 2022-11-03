<div class="relative z-20 w-12 h-12 cursor-pointer" @click="open = true">
    @if ($unread->count() > 0)
        <div class="absolute -left-2 -top-2 w-6 h-6 inline-block text-center text-sm rounded-full text-white bg-red-600">
            <span class="p-1.5">
                {{ $unread->count() }}
            </span>
        </div>
    @endif
<img src="{{'images/bell.png'}}" alt="sss">
</div>

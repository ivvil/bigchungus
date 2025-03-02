<div class="grid grid-cols-1 grid-rows-2 gap-0 border-4 boder-black w-48 h-80">
    <div class="w-full bg-white"><!-- Top: image or solid color -->

    </div>
    <div class="w-full h-1fr bg-red p-2"><!-- Bottom: text with solid bg -->
        <h3 class="h-15fr bg-black text-white">{{ $title }}</h3>
        <div class="h-85fr text-ellipsis overflow-hidden">
            {{  $body }}
        </div>
    </div>
</div>

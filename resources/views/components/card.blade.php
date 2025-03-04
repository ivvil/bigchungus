@props(['type' => 'info'])
<div class="grid grid-rows-[auto_1fr] grid-cols-2 gap-0 [grid-template-areas:'header_.'_'body_body']">
    <span @class([ "bg-black",
                                        "flex",
                                        "items-center",
                                        "p-1",
                                        "pl-4",
                                        "max-h-20",
                                        "[grid-area:header]"
                                        ])>
        <span class="bg-white grow-0 w-[30px] h-[30px] flex justify-center mr-4">
            @switch ($type)
                @case("warning") ! @break
                @case("error") x @break
                @case("info") i @break
                @case("ok") ✓ @break
            @endswitch
        </span>
        <span class="text-white">{{ $title ?? ucfirst($type) }}</span>
    </span>
    <div class="border-solid border border-black-500 bg-white [grid-area:body]">
        <div class="p-4">{{ $slot }}</div>
    </div>
</div>

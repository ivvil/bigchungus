@props(['type' => 'info'])
<div class="grid grid-rows-[auto_1fr] grid-cols-2 gap-0 [grid-template-areas:'header_.'_'body_body']">
    <span @class([ "card-head" , "bg-yellow"=> $type == "warning",
        "bg-red" => $type == "error",
        "bg-blue" => $type == "info",
        "bg-green" => $type == "ok",
        "flex",
        "items-center",
        "p-1",
        "pl-4",
        /* "max-w-96", */
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
        <span>{{ $title ?? ucfirst($type) }}</span>
    </span>
    <div class="border-solid border border-black-500 bg-white grid grid-cols-2 divide-x-2 col-span-2 row-start-2 [grid-area:body]">
        <div class="p-4">{{ $left }}</div>
        <div class="p-10">{{ $right }}</div>
    </div>
</div>

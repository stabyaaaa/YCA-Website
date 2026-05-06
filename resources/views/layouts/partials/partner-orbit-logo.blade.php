@php
    $jpg = "images/partners/{$item['img']}.jpg";
    $png = "images/partners/{$item['img']}.png";
@endphp

<div class="group relative">
    <div class="flex h-24 w-24 sm:h-28 sm:w-28 items-center justify-center rounded-3xl bg-white/95 border border-white/80 shadow-[0_14px_35px_rgba(0,0,0,0.18)] p-4 transition duration-300 hover:-translate-y-1 hover:scale-105 hover:shadow-[0_20px_45px_rgba(1,157,222,0.25)]">
        <img
            src="{{ asset($jpg) }}"
            onerror="this.onerror=null; this.src='{{ asset($png) }}';"
            alt="{{ $item['name'] }}"
            class="max-h-16 sm:max-h-20 max-w-full object-contain"
        >
    </div>

    <div class="pointer-events-none absolute left-1/2 top-full z-30 mt-3 w-44 -translate-x-1/2 rounded-2xl bg-white px-3 py-2 text-center text-xs font-semibold text-slate-700 shadow-xl opacity-0 translate-y-2 transition duration-300 group-hover:opacity-100 group-hover:translate-y-0">
        {{ $item['name'] }}
    </div>
</div>
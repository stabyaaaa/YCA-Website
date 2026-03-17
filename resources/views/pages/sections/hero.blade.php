@php
$fields = $section->fields->pluck('field_value','field_key');

$title = $fields['title'] ?? '';
$subtitle = $fields['subtitle'] ?? '';
$image = $fields['image'] ?? '';

$titleField = $section->fields->where('field_key','title')->first();
$subtitleField = $section->fields->where('field_key','subtitle')->first();
@endphp

<section class="relative py-32 overflow-hidden bg-gradient-to-br from-gray-50 to-white">

    <!-- Background Decoration -->
    <div class="absolute inset-0 opacity-40 pointer-events-none">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-100 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-72 h-72 bg-green-100 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 text-center">

        <!-- Title -->
        <h1
            class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight"
            @if($editMode && $titleField)
                contenteditable="true"
                data-id="{{ $titleField->id }}"
            @endif
        >
            {{ $title }}
        </h1>

        <!-- Subtitle -->
        <p
            class="mt-6 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed"
            @if($editMode && $subtitleField)
                contenteditable="true"
                data-id="{{ $subtitleField->id }}"
            @endif
        >
            {{ $subtitle }}
        </p>

        <!-- Hero Image -->
        @if($image)
        <div class="mt-14 flex justify-center">
            <img 
                src="{{ asset('storage/'.$image) }}" 
                class="rounded-2xl shadow-xl max-w-4xl w-full object-cover"
            >
        </div>
        @endif

    </div>

</section>


{{-- EDIT MODE STYLE --}}
@if($editMode)

<style>

[contenteditable="true"]{
outline:2px dashed #3b82f6;
padding:6px;
border-radius:6px;
cursor:text;
}

</style>

@endif
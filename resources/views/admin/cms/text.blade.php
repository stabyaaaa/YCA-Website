@props([
    'cms',
    'section',
    'field',
    'default' => '',
    'tag' => 'div',
])

@php
    $value = $cms[$section][$field] ?? $default;
@endphp

<{{ $tag }}
    contenteditable="{{ canEditCms() ? 'true' : 'false' }}"
    data-section="{{ $section }}"
    data-field="{{ $field }}"
    class="cms-inline-edit {{ canEditCms() ? 'cms-editable' : '' }}"
>
    {{ $value }}
</{{ $tag }}>
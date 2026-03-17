@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto py-12">

<h1 class="text-3xl font-bold mb-10">
Edit Page: {{ $page->title }}
</h1>

@if(session('success'))
<div class="bg-green-100 text-green-800 p-3 rounded mb-6">
{{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('cms.pages.update',$page->id) }}">

@csrf

@foreach($page->sections as $section)

<div class="border p-6 mb-8 rounded">

<h2 class="text-xl font-semibold mb-4">
Section: {{ $section->section_key }}
</h2>

@foreach($section->fields as $field)

<div class="mb-4">

<label class="block mb-1 font-medium">
{{ $field->field_key }}
</label>

@if($field->field_type == 'textarea')

<textarea
name="{{ $field->id }}"
class="w-full border p-2 rounded"
rows="4">{{ $field->field_value }}</textarea>

@else

<input
type="text"
name="{{ $field->id }}"
value="{{ $field->field_value }}"
class="w-full border p-2 rounded">

@endif

</div>

@endforeach

</div>

@endforeach


<button class="bg-blue-600 text-white px-6 py-3 rounded">
Update Page
</button>

</form>

</div>

@endsection
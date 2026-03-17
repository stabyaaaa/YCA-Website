@extends('layouts.app')

@section('content')

@php
$editMode = request()->has('edit') 
            && auth()->check() 
            && in_array(auth()->user()->role, ['admin','super_admin']);
@endphp


{{-- EDIT BUTTON --}}
@auth
@if(in_array(auth()->user()->role, ['admin','super_admin']) && !$editMode)

<div class="max-w-7xl mx-auto mt-6 text-right">
<a href="{{ route('cms.pages.edit', $page->id) }}"
class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
Edit Page
</a>

@endif
@endauth


{{-- SAVE BUTTON --}}
@if($editMode)

<button id="saveCMS"
class="fixed bottom-6 right-6 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg">
Save Changes
</button>

@endif


{{-- PAGE SECTIONS --}}
@foreach($page->sections as $section)

@includeIf('pages.sections.' . $section->section_key, [
'section' => $section,
'editMode' => $editMode
])

@endforeach


{{-- SAVE SCRIPT --}}
@if($editMode)

<script>

const saveBtn = document.getElementById('saveCMS');

if(saveBtn){

saveBtn.addEventListener('click', function(){

let data = {};

document.querySelectorAll('[contenteditable]').forEach(el => {

let id = el.dataset.id;

if(id){
data[id] = el.innerText.trim();
}

});

console.log("CMS DATA:", data);

fetch('/admin/cms/update-inline', {

method: 'POST',
credentials: 'same-origin',

headers: {
'Content-Type': 'application/json',
'Accept': 'application/json',
'X-CSRF-TOKEN': '{{ csrf_token() }}'
},

body: JSON.stringify(data)

})
.then(response => {

console.log("STATUS:", response.status);

return response.json();

})
.then(result => {

console.log("SERVER RESPONSE:", result);

location.reload();

})
.catch(error => {

console.error("CMS SAVE ERROR:", error);

alert("Failed to save changes.");

});

});

}

</script>

@endif

@endsection
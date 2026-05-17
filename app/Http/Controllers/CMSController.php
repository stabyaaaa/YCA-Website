<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Section;
use App\Models\Field;

class CMSController extends Controller
{
    private function authorizeCmsEditor(): void
    {
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'super_admin'])) {
            abort(403, 'Unauthorized');
        }
    }

    public function edit(Page $page)
    {
        $this->authorizeCmsEditor();

        $page->load('sections.fields');

        return view('admin.cms.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $this->authorizeCmsEditor();

        $page->load('sections.fields');

        foreach ($page->sections as $section) {
            foreach ($section->fields as $field) {
                if ($request->has($field->id)) {
                    $field->update([
                        'field_value' => $request->input($field->id),
                    ]);
                }
            }
        }

        $redirectSection = $request->input('redirect_section');

        return redirect('/')
            ->with('success', 'Page updated successfully')
            ->withFragment($redirectSection);
    }

    public function inlineUpdate(Request $request)
    {
        $this->authorizeCmsEditor();

        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section' => 'required|string',
            'field' => 'required|string',
            'value' => 'nullable|string',
        ]);

        $section = Section::where('page_id', $request->page_id)
            ->where('section_key', $request->section)
            ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' => 'Section not found',
            ], 404);
        }

        $field = Field::where('section_id', $section->id)
            ->where('field_key', $request->field)
            ->first();

        if (! $field) {
            return response()->json([
                'success' => false,
                'message' => 'Field not found: ' . $request->field,
            ], 404);
        }

        $field->update([
            'field_value' => $request->value,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function inlineImageUpdate(Request $request)
    {
        $this->authorizeCmsEditor();

        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section' => 'required|string',
            'field' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $section = Section::where('page_id', $request->page_id)
            ->where('section_key', $request->section)
            ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' => 'Section not found',
            ], 404);
        }

        $field = Field::where('section_id', $section->id)
            ->where('field_key', $request->field)
            ->first();

        if (! $field) {
            return response()->json([
                'success' => false,
                'message' => 'Field not found: ' . $request->field,
            ], 404);
        }

        $path = $request->file('image')->store('cms', 'public');

        $field->update([
            'field_value' => 'storage/' . $path,
        ]);

        return response()->json([
            'success' => true,
            'path' => asset('storage/' . $path),
        ]);
    }

    public function inlineFileUpdate(Request $request)
    {
        $this->authorizeCmsEditor();

        $request->validate([
            'page_id' => 'required|exists:pages,id',
            'section' => 'required|string',
            'field' => 'required|string',
            'file' => 'required|file|mimes:pdf|max:20480',
        ]);

        $section = Section::where('page_id', $request->page_id)
            ->where('section_key', $request->section)
            ->first();

        if (! $section) {
            return response()->json([
                'success' => false,
                'message' => 'Section not found',
            ], 404);
        }

        $field = Field::where('section_id', $section->id)
            ->where('field_key', $request->field)
            ->first();

        if (! $field) {
            return response()->json([
                'success' => false,
                'message' => 'Field not found: ' . $request->field,
            ], 404);
        }

        $path = $request->file('file')->store('files', 'public');

        $field->update([
            'field_value' => 'storage/' . $path,
        ]);

        return response()->json([
            'success' => true,
            'path' => asset('storage/' . $path),
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class CMSController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show CMS Page Editor
    |--------------------------------------------------------------------------
    */

    public function edit(Page $page)
    {
        // Load sections and fields
        $page->load('sections.fields');

        return view('admin.cms.edit', compact('page'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Page Fields
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Page $page)
    {
        $page->load('sections.fields');

        foreach ($page->sections as $section) {

            foreach ($section->fields as $field) {

                // field id used as input name
                if ($request->has($field->id)) {

                    $field->update([
                        'field_value' => $request->input($field->id)
                    ]);

                }

            }

        }

        return redirect()
            ->route('cms.pages.edit', $page->id)
            ->with('success', 'Page updated successfully');

    }
}
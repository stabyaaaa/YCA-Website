<?php

namespace App\Http\Controllers;

use App\Models\Page;

class HomeController extends Controller
{
    public function index()
    {
        $page = Page::with('sections.fields')
            ->where('slug', 'home')
            ->where('status', 'published')
            ->firstOrFail();

        $cms = [];

        foreach ($page->sections as $section) {
            foreach ($section->fields as $field) {
                $cms[$section->section_key][$field->field_key] = $field->field_value;
            }
        }

        return view('welcome', compact('page', 'cms'));
    }
    public function about()
    {
        $page = Page::where('slug', 'about')
            ->with('sections.fields')
            ->first();

        $cms = [];

        if ($page) {
            foreach ($page->sections as $section) {
                foreach ($section->fields as $field) {
                    $cms[$section->section_key][$field->field_key] = $field->field_value;
                }
            }
        }

        return view('about', compact('page', 'cms'));
    }
}
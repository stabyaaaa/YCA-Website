<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug',$slug)
            ->with('sections.fields')
            ->firstOrFail();

        return view('pages.dynamic', compact('page'));
    }
}
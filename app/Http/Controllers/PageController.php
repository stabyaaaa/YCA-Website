<?php

namespace App\Http\Controllers;

use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->with('sections.fields')
            ->firstOrFail();

        return view('pages.dynamic', compact('page'));
    }

    public function announcements()
    {
        return view('announcements.index');
    }

    public function ieeeCareerFair()
    {
        return view('announcements.ieee-career-fair');
    }
}
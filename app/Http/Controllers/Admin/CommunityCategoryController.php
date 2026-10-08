<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CommunityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommunityCategoryController extends Controller
{
    public function index()
    {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );

        $categories = CommunityCategory::orderBy('name')
            ->get();

        return view(
            'admin.community.categories.index',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:community_categories,name',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        CommunityCategory::create([
            'name' => $validated['name'],

            'slug' => Str::slug(
                $validated['name']
            ),

            'description' =>
                $validated['description'] ?? null,

            'is_active' => true,
        ]);

        return back()->with(
            'success',
            'Category created successfully.'
        );
    }

    public function toggle(
        CommunityCategory $category
    ) {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );

        $category->update([
            'is_active' => !$category->is_active,
        ]);

        return back()->with(
            'success',
            'Category status updated.'
        );
    }

    public function destroy(
        CommunityCategory $category
    ) {
        abort_unless(
            auth()->user()?->role === 'super_admin',
            403
        );

        if ($category->posts()->exists()) {

            return back()->with(
                'error',
                'This category cannot be deleted because posts are already using it.'
            );
        }

        $category->delete();

        return back()->with(
            'success',
            'Category deleted.'
        );
    }
}
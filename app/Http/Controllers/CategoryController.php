<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'slug' => 'nullable|unique:categories',
        ]);

        $slug = $request->slug ?: \Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug, 
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'slug' => 'nullable|unique:categories,slug,' . $category->id, 
        ]);

        $slug = $request->slug ?: \Str::slug($request->name);

        $category->update([
            'name' => $request->name,
            'slug' => $slug, 
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
}

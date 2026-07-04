<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('image')->latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => ['required', 'min:2', 'max:30'],
            'name_ar' => ['required', 'min:2', 'max:30'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'image' => ['required', 'image', 'mimes:png,jpg']
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'parent_id' => $request->parent_id,
        // ];

        // $name = [
        //     'en' => $request->name_en,
        //     'ar' => $request->name_ar
        // ];

        $category = Category::create([
            'name' => '',
            'slug' => Str::slug($request->name_en),
            'parent_id' => $request->parent_id,
        ]);

        // Add Image To Relation
        $path = $request->file('image')->store('categories', 'public');
        $category->image()->create([
            'path' => $path,
        ]);

        flash()->success(__('Category created successfully'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_en' => ['required', 'min:2', 'max:30'],
            'name_ar' => ['required', 'min:2', 'max:30'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:png,jpg']
        ]);

        // $data = [
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name),
        //     'parent_id' => $request->parent_id,
        // ];

        // $name = [
        //     'en' => $request->name_en,
        //     'ar' => $request->name_ar
        // ];

        $category->update([
            'name' => '',
            'slug' => Str::slug($request->name_en),
            'parent_id' => $request->parent_id,
        ]);

        if ($request->hasFile('image')) {

            if ($category->image?->path) {
                Storage::disk('public')->delete($category->image->path);
            }

            $path = $request->file('image')->store('categories', 'public');
            $category->image()->update([
                'path' => $path
            ]);
        }

        flash()->success(__('Category updated successfully'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image?->path) {
            Storage::disk('public')->delete($category->image->path);
        }

        $category->delete();
        flash()->success(__('Category deleted successfully'));
        return redirect()->route('admin.categories.index');
    }
}

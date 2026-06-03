<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:20'],
            'image' => ['required', 'image', 'mimes:png,jpg']
        ]);

        // $path = rand() . "_" . time() . "_" . rand() . "." . $request->file('image')->getClientOriginalExtension();
        // $target_file = public_path('uploads/');
        // $request->file('image')->move($target_file, $path);

        // $path = $request->file('image')->store('categories', 'public');
        $path = $request->file('image')->store('categories', 'custom');

        // dd($request->all());

        return view('admin.categories', compact('path'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

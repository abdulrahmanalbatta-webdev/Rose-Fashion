<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = ["Category1", "Category2", "Category3", "Category4"];
        $brands = ["Brand1", "Brand2", "Brand3", "Brand4"];
        $stocks = ["InStock", "Out of Stock"];
        $featured = ["No", "Yes"];
        return view('admin.add-product', compact('categories', 'brands', 'stocks', 'featured'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->file('image')->store('products', 'custom') ?? '';

        $images = [];

        foreach ($request->file('gallery') as $img) {
            $images[] = $img->store('products', 'custom') ?? '';
        }
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

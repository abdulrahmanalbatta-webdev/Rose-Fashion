<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $stocks = array_map(fn($item) => (object) $item, [
            ["id" => 1, "trans_name" => __('In Stock')],
            ["id" => 0, "trans_name" => __('Out of Stock')],
        ]);

        $featuredOptions = array_map(fn($item) => (object) $item, [
            ["id" => 1, "trans_name" => __('Featured')],
            ["id" => 0, "trans_name" => __('Not Featured')],
        ]);

        return view('admin.products.create', compact('categories', 'brands', 'stocks', 'featuredOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {

        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar
        ];

        $short_description = [
            'en' => $request->short_description_en,
            'ar' => $request->short_description_ar
        ];

        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar
        ];

        $product = Product::create([
            'name' => json_encode($name),
            'slug' => Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => json_encode($short_description),
            'description' => json_encode($description),
            'cost_price' => $request->cost_price,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'in_stock' => $request->in_stock,
            'featured' => $request->featured
        ]);

        // Add image to relation
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $product->image()->create([
                'path' => $path
            ]);
        }

        // Add gallery to relation
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $product->gallery()->create([
                    'path' => $img->store('products', 'public'),
                    'type' => 'gallery'
                ]);
            }
        }

        flash()->success(__('Product created successfully'));
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $stocks = array_map(fn($item) => (object) $item, [
            ["id" => 1, "trans_name" => __('In Stock')],
            ["id" => 0, "trans_name" => __('Out of Stock')],
        ]);

        $featuredOptions = array_map(fn($item) => (object) $item, [
            ["id" => 1, "trans_name" => __('Featured')],
            ["id" => 0, "trans_name" => __('Not Featured')],
        ]);

        return view('admin.products.edit', compact('product', 'categories', 'brands', 'stocks', 'featuredOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $name = [
            'en' => $request->name_en,
            'ar' => $request->name_ar
        ];

        $short_description = [
            'en' => $request->short_description_en,
            'ar' => $request->short_description_ar
        ];

        $description = [
            'en' => $request->description_en,
            'ar' => $request->description_ar
        ];

        $product->update([
            'name' => json_encode($name),
            'slug' => Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'short_description' => json_encode($short_description),
            'description' => json_encode($description),
            'cost_price' => $request->cost_price,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'sku' => $request->sku,
            'quantity' => $request->quantity,
            'in_stock' => $request->in_stock,
            'featured' => $request->featured
        ]);

        // Update main image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image->path);
                $product->image()->delete();
            }

            $path = $request->file('image')->store('products', 'public');
            $product->image()->create(['path' => $path]);
        }

        // Update gallery: delete removed old images + add new ones
        $keptIds = array_filter(explode(',', $request->input('kept_gallery', '')));

        $product->gallery()
            ->when(!empty($keptIds), fn($q) => $q->whereNotIn('id', $keptIds), fn($q) => $q)
            ->get()
            ->each(function ($image) {
                Storage::disk('public')->delete($image->path);
                $image->delete();
            });

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $product->gallery()->create([
                    'path' => $img->store('products', 'public'),
                    'type' => 'gallery'
                ]);
            }
        }

        flash()->success(__('Product updated successfully'));
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {
            if ($product->image?->path) {
                Storage::disk('public')->delete($product->image->path);
            }
            $product->image()->delete();

            foreach ($product->gallery as $image) {
                Storage::disk('public')->delete($image->path);
            }
            $product->gallery()->delete();

            $product->delete();
        });

        flash()->success(__('Product deleted successfully'));
        return redirect()->route('admin.products.index');
    }
}

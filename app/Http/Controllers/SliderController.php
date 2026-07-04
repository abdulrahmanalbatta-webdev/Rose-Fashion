<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view("admin.sliders.index", compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $products = Product::all();

        $linkTypes = array_map(fn($i) => (object) $i, [
            ['id' => 'category', 'trans_name' => __('Category')],
            ['id' => 'product', 'trans_name' => __('Product')],
            ['id' => 'external', 'trans_name' => __('External URL')],
        ]);

        $isActiveOptions = array_map(fn($i) => (object) $i, [
            ['id' => 1, 'trans_name' => __('Active')],
            ['id' => 0, 'trans_name' => __('Inactive')],
        ]);

        return view('admin.sliders.create', compact('categories', 'products', 'linkTypes', 'isActiveOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'tag_en'           => ['required', 'string', 'max:100'],
            'title_line1_en'   => ['required', 'string', 'max:150'],
            'title_line2_en'   => ['required', 'string', 'max:150'],
            'button_text_en'   => ['required', 'string', 'max:50'],
            'tag_ar'           => ['required', 'string', 'max:100'],
            'title_line1_ar'   => ['required', 'string', 'max:150'],
            'title_line2_ar'   => ['required', 'string', 'max:150'],
            'button_text_ar'   => ['required', 'string', 'max:50'],
            'image'            => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'link_type'        => ['required', 'in:category,product,external'],
            'link_id'          => ['required_if:link_type,category,product', 'nullable', 'integer'],
            'external_url'     => ['required_if:link_type,external', 'nullable', 'url'],
            'sort_order'       => ['required', 'integer', 'min:0'],
            'is_active'        => ['required', 'boolean'],
        ]);

        $tag = [
            'en' => $request->tag_en,
            'ar' => $request->tag_ar
        ];


        $title_line1 = [
            'en' => $request->title_line1_en,
            'ar' => $request->title_line1_ar
        ];

        $title_line2 = [
            'en' => $request->title_line2_en,
            'ar' => $request->title_line2_ar
        ];

        $button_text = [
            'en' => $request->button_text_en,
            'ar' => $request->button_text_ar
        ];

        $slider =  Slider::create([
            'tag' => json_encode($tag),
            'title_line1' => json_encode($title_line1),
            'title_line2' => json_encode($title_line2),
            'button_text' => json_encode($button_text),
            'link_type' => $request->link_type,
            'link_id' => $request->link_id,
            'external_url' => $request->external_url,
            'sort_order' => $request->sort_order,
            'is_active' => $request->is_active
        ]);

        // Add image to relation
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $slider->image->create([
                'path' => $path
            ]);
        }

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', __('Slide created successfully.'));
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
    public function edit(Slider $slider)
    {
        return view("admin.sliders.edit", compact($slider));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'tag_en'           => ['nullable', 'string', 'max:100'],
            'title_line1_en'   => ['required', 'string', 'max:150'],
            'title_line2_en'   => ['required', 'string', 'max:150'],
            'button_text_en'   => ['nullable', 'string', 'max:50'],
            'tag_ar'           => ['nullable', 'string', 'max:100'],
            'title_line1_ar'   => ['required', 'string', 'max:150'],
            'title_line2_ar'   => ['required', 'string', 'max:150'],
            'button_text_ar'   => ['nullable', 'string', 'max:50'],
            'image'            => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],
            'link_type'        => ['required', 'in:category,product,external'],
            'link_id'          => ['required_if:link_type,category,product', 'nullable', 'integer'],
            'external_url'     => ['required_if:link_type,external', 'nullable', 'url'],
            'sort_order'       => ['nullable', 'integer', 'min:0'],
            'is_active'        => ['required', 'boolean'],
        ]);

        $tag = [
            'en' => $request->tag_en,
            'ar' => $request->tag_ar
        ];


        $title_line1 = [
            'en' => $request->title_line1_en,
            'ar' => $request->title_line1_ar
        ];

        $title_line2 = [
            'en' => $request->title_line2_en,
            'ar' => $request->title_line2_ar
        ];

        $button_text = [
            'en' => $request->button_text_en,
            'ar' => $request->button_text_ar
        ];

        $slider->update([
            'tag' => json_encode($tag),
            'title_line1' => json_encode($title_line1),
            'title_line2' => json_encode($title_line2),
            'button_text' => json_encode($button_text),
            'link_type' => $request->link_type,
            'link_id' => $request->link_id,
            'external_url' => $request->external_url,
            'sort_order' => $request->sort_order,
            'is_active' => $request->is_active
        ]);

        // Add image to relation
        if ($request->hasFile('image')) {

            if ($slider->image?->path) {
                Storage::disk('public')->delete($slider->image->path);
            }

            $path = $request->file('image')->store('sliders', 'public');
            $slider->image->create([
                'path' => $path
            ]);
        }

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', __('Slide created successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image?->path) {
            Storage::disk('public')->delete($slider->image->path);
        }

        $slider->delete();
        flash()->success(__('Slider deleted successfully'));
        return redirect()->route('admin.categories.index');
    }
}

<?php

namespace App\Http\Requests;

use App\Rules\AlphaEnglish;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'max:100', new AlphaEnglish],
            // 'category_id' => ['required', 'exists:categories,id', new AlphaEnglish],
            // 'brand_id' => ['required', 'exists:brands,id', new AlphaEnglish],
            'short_description' => ['required', 'string', 'min:5', 'max:500', new AlphaEnglish],
            'description' => ['required', 'string', 'min:20', 'max:255', new AlphaEnglish],
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048', new AlphaEnglish],
            'gallery' => ['required', 'array', new AlphaEnglish],
            'gallery.*' => ['image', 'mimes:png,jpg,jpeg,webp', 'max:2048', new AlphaEnglish],
            'regular_price' => ['required', 'numeric', 'min:0', new AlphaEnglish],
            'sale_price' => ['required', 'numeric', 'gt:regular_price', new AlphaEnglish],
            // 'SKU' => ['required', 'string', 'unique:products,SKU', new AlphaEnglish],
            'quantity' => ['required', 'integer', 'min:0', new AlphaEnglish],
            'stock' => ['required', 'in:in_stock,out_of_stock', new AlphaEnglish],
            'featured' => ['required', 'boolean', new AlphaEnglish],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => 'الحقل مطلووووووووووووب'
    //     ];
    // }
}

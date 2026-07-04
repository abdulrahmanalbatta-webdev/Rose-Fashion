<?php

namespace App\Http\Requests;

use App\Rules\AlphaEnglish;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name_en' => ['required', 'min:2', 'max:100', new AlphaEnglish],
            'name_ar' => ['required', 'min:2', 'max:100'],

            'category_id' => ['required', 'exists:categories,id'],
            'brand_id' => ['required', 'exists:brands,id'],

            'short_description_en' => ['required', 'string', 'min:5', 'max:500'],
            'short_description_ar' => ['required', 'string', 'min:5', 'max:500'],

            'description_en' => ['required', 'string', 'min:20', 'max:5000'],
            'description_ar' => ['required', 'string', 'min:20', 'max:5000'],

            'cost_price' => ['required', 'numeric', 'min:0'],

            'image' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'image',
                'mimes:png,jpg,jpeg,webp',
                'max:2048'
            ],

            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:png,jpg,jpeg,webp', 'max:2048'],

            'regular_price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'lt:regular_price'],

            'sku' => [
                'required',
                'string',
                Rule::unique('products', 'sku')->ignore($this->route('product')),
            ],

            'quantity' => ['required', 'integer', 'min:0'],
            'in_stock' => ['required', 'boolean'],
            'featured' => ['required', 'boolean'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'required' => 'الحقل مطلووووووووووووب'
    //     ];
    // }
}

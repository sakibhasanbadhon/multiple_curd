<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        $role=[
            'product_name' => ['required','string'],
            'product_slug' => ['required','string','unique:products,product_name'],
            'product_code' => ['required','string','max:20'],
            'qty'          => ['required','integer'],
            'price'        => ['required'],
            'image'        => ['nullable','image','mimes:png,jpg,jpeg'],
            'brand_id'     => ['required','integer'],
            'category_id'  => ['required','integer'],
            'status'       => ['required','integer']
        ];

        return $role;

    }

    public function messages()
    {
        return[
            'qty.required' => 'Quantity field is required.',
            'qty.integer'  => 'Quantity must be an integer.',

            'brand_id.required' => 'Brand field is required.',
            'brand_id.integer'  => 'Brand must be an integer.',

            'category_id.required' => 'category field is required.',
            'category_id.integer'  => 'category must be an integer.',

            'image.required' => 'Product image field is required.',
            'image.image' => 'Product image file of type png, jpg, jpeg.',
        ];
    }

}

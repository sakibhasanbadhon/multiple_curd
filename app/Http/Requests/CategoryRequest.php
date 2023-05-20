<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rule = [
            'category_name' => ['required','string','min:5','max:100','unique:categories,name'], //unique data jeno ase
            'status'     => ['required','in:0,1'],

        ];

        if (isset(request()->update_id)) {
            $rule['category_name'][4] = 'unique:categories,name,'.request()->update_id;
        }

        return $rule;
    }
}

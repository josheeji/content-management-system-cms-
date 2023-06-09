<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
        return [
            'category_name' => 'required|min:2|max:255',

            'image' =>'required|mimes:jpeg,png,jpg,gif|max:2048',

            'slug' => 'required|min:2|max:255',

            'description' => 'required|min:2|',

            'meta_title' => 'required|min:2|max:255',

            'meta_keyword' => 'required|min:2|max:255',

            'meta_description' => 'required|min:2',

            'status' => 'nullable',

            'navbar_status' => 'nullable',
        ];
    }
}

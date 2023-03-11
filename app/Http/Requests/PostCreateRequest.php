<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'image' =>'image|mimes:jpeg,png,jpg,gif|max:2048',

            'slug' => 'required|min:2|max:255',
            'sub_title' => 'required|min:2|max:255',

            'content' => 'required|min:2|',
            'meta_keys' => 'required|min:2|max:255',
            'meta_desc' => 'required|min:2',

            'category_id' => 'required|min:2|max:255',
            'status' => 'nullable|boolean',
            // 'navbar_status' => 'nullable|boolean',
        ];
    }
}

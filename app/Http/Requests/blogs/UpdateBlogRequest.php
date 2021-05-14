<?php

namespace App\Http\Requests\blogs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'author'=>'required|string',
            'content'=>'required|string|min:10|max:5000',
            'image'=>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
        ];
    }


    public function messages()
    {

        return [
            'title.required'=>'Title is required',
            'title.string'=>'Title must be string',
            'subtitle.required'=>'Subtitle is required',
            'subtitle.string'=>'Subtitle must be string',
            'author.required'=>'Author is required',
            'author.string'=>'Author must be string',
            'content.required'=>'Content is required',
            'content.string'=>'Content must be string',
        ];
    }
}

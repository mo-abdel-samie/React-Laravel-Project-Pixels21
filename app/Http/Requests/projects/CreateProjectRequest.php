<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'image'=>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'content'=>'required',
        ];
    }


    public function messages()
    {

        return [
            'title.required'=>'Title is required',
            'title.string'=>'Title must be string',
            'subtitle.required'=>'Subtitle is required',
            'subtitle.string'=>'Subtitle must be string',
            'content'=>'Content is required',
            'image.required'=>'Image is required',
        ];
    }
}

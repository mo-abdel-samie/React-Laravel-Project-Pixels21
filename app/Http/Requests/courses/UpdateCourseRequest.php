<?php

namespace App\Http\Requests\courses;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCourseRequest extends FormRequest
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
            'name'              =>'required|string',
            'category_id'       =>'required|integer',
            'rate'              =>'required|numeric|min:0|max:10',
            'image'             =>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_image'      =>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_desc'       =>'required|string',
            'description'       =>'required|string',
            'share_links.*'     =>'required|url',
            'content.*'         =>'required|string',
            'includes_titles.*' =>'required|string',
            'includes_icons.*'  =>'required|string',
        ];
    }


    public function messages()
    {

        return [
            'name.required'                 =>'name is required',
            'name.string'                   =>'name must be string',
            'category_id.required'          =>'category is required',
            'category_id.string'            =>'category must be string',
            'rate.required'                 =>'rate is required',
            'rate.string'                   =>'rate must be string',
            'image.required'                =>'image is required',
            'image.string'                  =>'image must be string',
            'header_image.required'         =>'header_image is required',
            'header_image.string'           =>'header_image must be string',
            'header_desc.required'          =>'header_desc is required',
            'header_desc.string'            =>'header_desc must be string',
            'description.required'          =>'description is required',
            'description.string'            =>'description must be string',
            'share_links.*.required'        =>'share_links is required',
            'share_links.*.string'          =>'share_links must be string',
            'content.*.required'            =>'content is required',
            'content.*.string'              =>'content must be string',
            'includes_titles.*.required'    =>'includes_titles is required',
            'includes_titles.*.string'      =>'includes_titles must be string',
            'includes_icons.*.required'     =>'includes_icons is required',
            'includes_icons.*.string'       =>'includes_icons must be string',
        ];
    }
}

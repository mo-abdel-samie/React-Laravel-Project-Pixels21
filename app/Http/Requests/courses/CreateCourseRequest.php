<?php

namespace App\Http\Requests\courses;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'name'                =>'required|string',
            'category_id'         =>'required|integer',
            'rate'                =>'required|numeric|min:0|max:10',
            'image'               =>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_image'        =>'required|file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'header_desc'         =>'required|string',
            'description'         =>'required|string',
            'share_links_urls.*'   =>'required|url',
            'share_links_icons.*' =>'required|string',
            'content.*'           =>'required|string',
            'includes_titles.*'   =>'required|string',
            'includes_icons.*'    =>'required|string',
        ];
    }


    public function messages()
    {

        return [
            'name.required'                 =>'name is required',
            'name.string'                   =>'name must be string',
            'category_id.required'             =>'category is required',
            'category_id.integer'               =>'category must be string',
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
            'share_links_urls.*.required'   =>'This field is required',
            'share_links_urls.*.url'        =>'This field must be Url',
            'share_links_icons.*.required'  =>'This field is required',
            'share_links_icons.*.string'    =>'This field must be string',
            'content.*.required'            =>'content is required',
            'content.*.string'              =>'content must be string',
            'includes_titles.*.required'    =>'includes_titles is required',
            'includes_titles.*.string'      =>'includes_titles must be string',
            'includes_icons.*.required'     =>'includes_icons is required',
            'includes_icons.*.string'       =>'includes_icons must be string',

        ];
    }
}

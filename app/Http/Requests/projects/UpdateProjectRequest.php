<?php

namespace App\Http\Requests\projects;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'image'=>'file|image|mimes:jpg,jpeg,png,svg,gif|max:5000',
            'content'=>'required',
        ];
    }


    public function messages()
    {

        return [
            'name_ar.required' => __('messages.offer name required'),
            'name_en.required' => __('messages.offer name required'),
            'name_ar.unique' => 'اسم العرض موجود ',
            'name_en.unique' => 'Offer name  is exists ',
            'price.numeric' => 'سعر العرض يجب ان يكون ارقام',
            'price.required' => 'السعر مطلوب',
            'details_ar.required' => 'ألتفاصيل مطلوبة ',
            'details_en.required' => 'ألتفاصيل مطلوبة ',
            'photo.required' =>  'صوره العرض مطلوب',
            'photo.mimes' =>  'صوره غير صالحة',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'news_category_id' => 'required',
            'short_description' => 'required|max:80',
            'description' => 'required',
            'cover_image' => 'required|file|image|max:5000',
            'thumbnail_image' => 'required|file|image|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'คุณจำเป็นต้องกรอกหัวข้อข่าว',
            'news_category_id.required' => 'คุณจำเป็นเลือกหมวดหมู่',
            'short_description.required' => 'คุณจำเป็นต้องกรอกบทนำ',
            'description.required' => 'คุณจำเป็นต้องกรอกเนื้อหา',
            'cover_image.required' => 'คุณจำเป็นต้องใส่รูปภาพ',
            'thumbnail_image.required' => 'คคุณจำเป็นต้องใส่รูปภาพ',
        ];
    }

}

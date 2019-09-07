<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'role_employee_id' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อขนม',
            'price.required' => 'คุณจำเป็นต้องกรอกข้อมูลราคาขนม',
            'price.numeric' => 'กรุณากรอกข้อมูลราคาขนมเป็นตัวเลข',
            'role_employee_id.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อขนม',

        ];
    }
}

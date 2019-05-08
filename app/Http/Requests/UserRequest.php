<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $data = $this->request->all();

        $rules = [
            'username' => 'required|string|max:40|unique:users,username,'. $this->user()->id,
            'shop_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email,'. $this->user()->id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'id_card' => 'required|unique:users,id_card,'. $this->user()->id,
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'role_id' => 'required',
            'gender' => 'nullable|string|max:255',
        ];

        if (!empty($data['password'])) {
            $rules += ['password' => 'required|string|min:6|confirmed',];
        };

        if (!empty($data['image'])) {
            $rules += ['image' => ['required', 'file', 'image', 'max:5000'],];
        };

        return $rules;

    }
    public function messages()
    {
        return [
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'username.regex' => 'ชื่อผู้ใช้สามารถกรอกได้เฉพาะ A-Z a-z และ 0-9 เท่านั้น',
            'username.unique' => 'ชื่อผู้ใช้ถูกใช้ไปแล้ว',
            'password.required' => 'คุณจำเป็นต้องกรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'password.max' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'shop_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อร้าน',
            'first_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'last_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลนามสกุล',
            'nickname.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อเล่น',
            'id_card.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'gender.required' => 'คุณจำเป็นต้องกรอกข้อมูลเพศ',
            'role_type_id' => 'คุณจำเป็นต้องกรอกข้อมูลประเภทลูกค้า',
            'phone_number.required' => 'คุณจำเป็นต้องกรอกข้อมูลหมายเลขโทรศัพท์',
            'address.required' => 'คุณจำเป็นต้องกรอกข้อมูลที่อยู่',
            'image.required' => 'คุณจำเป็นใส่รูปโปรไฟล์',
        ];
    }
}

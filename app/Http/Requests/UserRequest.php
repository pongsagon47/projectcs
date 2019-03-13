<?php

namespace App\Http\Requests;

use App\Rules\UniqeIdCrad;
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

       $id = request()->route('id');
        return [
            'username' => 'required|string|max:40|unique:users,username,'. $id,
            'password' => 'required|string|min:8|max:20|confirmed',
            'shop_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'id_card' => ['required', new UniqeIdCrad($id)],
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'roles_type_id' => 'required',
            'gender' => 'nullable|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'username.regex' => 'ชื่อผู้ใช้สามารถกรอกได้เฉพาะ A-Z a-z และ 0-9 เท่านั้น',
            'username.unique' => 'ชื่อผู้ใช้ถูกใช้ไปแล้ว',
            'password.required' => 'คุณจำเป็นต้องกรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านไม่เกิน 8-20 ตัว',
            'password.max' => 'กรุณากรอกรหัสผ่านไม่เกิน 8-20 ตัว',
            'shop_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อร้าน',
            'first_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'last_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลนามสกุล',
            'nickname.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อเล่น',
            'id_card.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'gender.required' => 'คุณจำเป็นต้องกรอกข้อมูลเพศ',
            'roles_type_id' => 'คุณจำเป็นต้องกรอกข้อมูลประเภทลูกค้า',
            'phone_number.required' => 'คุณจำเป็นต้องกรอกข้อมูลหมายเลขโทรศัพท์',
            'address.required' => 'คุณจำเป็นต้องกรอกข้อมูลที่อยู่',
        ];
    }
}

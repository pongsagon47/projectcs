<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditEmpRequest extends FormRequest
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
        $password = $this->request->all();

        $rules = [
            'username' => 'required|string|max:255|unique:employees,username,'.$this->route('id'),
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:employees,email,'.$this->route('id'),
            'id_card' => 'required|unique:employees,id_card,'.$this->route('id'),
            'nickname' => 'required|string|max:255',
            'gender' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'role_employee_id' => 'required',
        ];

        if (!empty($password['password'])) {
            $rules += ['password' => 'required|string|min:6|confirmed',];
        };

        return $rules;
    }

    public function messages()
    {
        return [
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'password.required' => 'คุณจำเป็นต้องกรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'password.max' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'frist_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'last_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลนามสกุล',
            'gender.required' => 'คุณจำเป็นต้องกรอกข้อมูลเพศ',
            'phone_number.required' => 'คุณจำเป็นต้องกรอกข้อมูลหมายเลขโทรศัพท์',
            'address.required' => 'คุณจำเป็นต้องกรอกข้อมูลที่อยู่',
        ];
    }
}

<?php

namespace App\Http\Controllers\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = 'employee/home';

    public function __construct()
    {
        $this->middleware('guest:employee');
    }

    public function showRegistrationForm()
    {
        return view('employee.register');
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string' , 'max:255', 'unique:employees'],
            'password' => ['required', 'string', 'min:6','max:20', 'confirmed'],
            'email' => ['required', 'string' , 'max:255', 'unique:employees'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_card' => ['required', 'string', 'max:255', 'unique:employees'],
            'nickname' => ['required', 'string', 'max:255'],
            'gender' => 'nullable|string|max:255',
            'image' => ['required', 'file', 'image', 'max:5000'],
            'phone_number' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'role_employee_id' => ['required'],
        ],[
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'password.required' => 'คุณจำเป็นต้องกรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'password.max' => 'กรุณากรอกรหัสผ่านไม่เกิน 6-20 ตัว',
            'email.unique' => 'อีเมล์นี้ถูกใช้งานไปแล้ว',
            'frist_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
            'image.required' => 'คุณจำเป็นใส่รูปโปรไฟล์',
            'last_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลนามสกุล',
            'gender.required' => 'คุณจำเป็นต้องกรอกข้อมูลเพศ',
            'phone_number.required' => 'คุณจำเป็นต้องกรอกข้อมูลหมายเลขโทรศัพท์',
            'address.required' => 'คุณจำเป็นต้องกรอกข้อมูลที่อยู่',

        ]);
    }

    protected function create(array $data)
    {
        $create = [
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'id_card' => $data['id_card'],
            'image' => $data['image']->store('uploads','public'),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'role_employee_id' => $data['role_employee_id'],
        ];

        if (empty($data['gender'])) {
            $create += ['gender' => null];
        }else {
            $create += ['gender' => $data['gender']];
        }

        return Employee::create($create);

    }
}

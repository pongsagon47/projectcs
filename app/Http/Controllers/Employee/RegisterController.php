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

    public function register(Request $request)
    {
        $data = $request->all();
        $data['id_card'] = str_replace(" ", "", "$request->id_card");
        $data['phone_number'] = str_replace("-", "", "$request->phone_number");

        $this->validator($data)->validate();

        event(new Registered($user = $this->create($data)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string' , 'max:255', 'unique:employees'],
            'password' => ['required', 'string', 'min:8','max:20', 'confirmed'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'id_card' => ['required', 'string', 'max:255', 'unique:employees'],
            'nickname' => ['required', 'string', 'max:255'],
            'gender' => 'nullable|string|max:255',
            'phone_number' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'roles_position_id' => ['required'],
        ],[
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'password.required' => 'คุณจำเป็นต้องกรอกข้อมูลรหัสผ่าน',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านไม่เกิน 8-20 ตัว',
            'password.max' => 'กรุณากรอกรหัสผ่านไม่เกิน 8-20 ตัว',
            'frist_name.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อ',
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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'id_card' => $data['id_card'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'roles_position_id' => $data['roles_position_id'],
        ];

        if (empty($data['gender'])) {
            $create += ['gender' => null];
        }else {
            $create += ['gender' => $data['gender']];
        }

        return Employee::create($create);

//        return Employee::create([
//            'username' => $data['username'],
//            'password' => Hash::make($data['password']),
//            'frist_name' => $data['frist_name'],
//            'last_name' => $data['last_name'],
//            'gender' => $data['gender'],
//            'phone_number' => $data['phone_number'],
//            'address' => $data['address'],
//            'roles_position_id' => $data['roles_position_id'],
//        ]);
    }
}

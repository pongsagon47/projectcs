<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'username' => ['required', 'string' , 'max:40', 'unique:users','regex:/^[A-Za-z][A-Za-z0-9]*$/i'],
            'password' => ['required', 'string', 'min:8','max:20', 'confirmed'],
            'shop_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255'],
            'id_card' => ['required', 'string', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'roles_type_id' => ['required'],
            'gender' => 'nullable|string|max:255',

        ],[
            'username.required' => 'คุณจำเป็นต้องกรอกข้อมูลชื่อผู้ใช้',
            'username.regex' => 'ชื่อผู้ใช้สามารถกรอกได้เฉพาะ A-Z a-z และ 0-9 เท่านั้น',
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

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $create = [
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'shop_name' => $data['shop_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'id_card' => $data['id_card'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'roles_type_id' => $data['roles_type_id'],
            'status' => '0',
        ];

        if (empty($data['gender'])) {
            $create += ['gender' => null];
        }else {
            $create += ['gender' => $data['gender']];
        }

        return User::create($create);
    }
}

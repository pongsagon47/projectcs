<?php

namespace App\Http\Controllers\BackendEmp\CrudUser;

use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminEditUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth:employee');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = User::query()
            ->where('status','=','1')
            ->get();
        return view ('backend-admin.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateUserRequest $request)
    {
        $data = $request->all();

        $create = [
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'shop_name' => $data['shop_name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'nickname' => $data['nickname'],
            'id_card' => $data['id_card'],
            'image' => $data['image']->store('uploads','public'),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'role_id' => $data['role_id'],
            'status' => '1',
        ];

        if (empty($data['gender'])) {
            $create += ['gender' => null];
        }else {
            $create += ['gender' => $data['gender']];
        }

        User::create($create);

        return redirect()->route('user.index')->with('success','เพิ่มข้อมูลลูกค้าเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('backend-admin.users.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('backend-admin.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditUserRequest $request, $id)
    {

        $data = $request->all();

        $user = User::find($id);
        $user->username = $data['username'];
        $user->shop_name = $data['shop_name'];
        $user->email = $data['email'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->nickname = $data['nickname'];
        $user->id_card = $data['id_card'];
        $user->phone_number = $data['phone_number'];
        $user->address = $data['address'];
        $user->role_id = $data['role_id'];
        $user->status = isset($data['status']) ? 1 : 0;

        if (isset($data['image'])){
            Storage::delete('public/'.$user->image);
            $user->image = ($data['image'])->store('uploads','public');
        }

        if (empty($data['gender'])) {
            $user->gender = null;
        }else {
            $user->gender = $data['gender'];;
        }
        if (!empty($request->password)) {
            $newPassword = Hash::make($data['password']);
            $user->password  = $newPassword;
        }

        $user->update();

        return redirect()->route('user.index')->withSuccess('แก้ไข User สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->forceDelete();

        return redirect()->route('user.index')->with('deleted','ลบ User เรียบร้อย');
    }
}

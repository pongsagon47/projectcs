<?php

namespace App\Http\Controllers\BackendEmp;

use App\Http\Requests\EmpRequest;
use App\Models\Employee;
use App\Models\RoleEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileEmpController extends Controller
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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = auth()->user()->id;
        $data = Employee::find($id);
        return view('backend-admin.employees.profile',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = auth()->user()->id;
        $role_employees = RoleEmployee::where('id','!=',1)
            ->get();
        $data = Employee::find($id);
        return view('backend-admin.employees.profile-edit',compact('data','role_employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpRequest $request)
    {
        $data = $request->all();

        $id = auth()->user()->id;
        $user = Employee::find($id);
        $user->username = $data['username'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->nickname = $data['nickname'];
        $user->id_card = $data['id_card'];
        $user->phone_number = $data['phone_number'];
        $user->address = $data['address'];
        $user->role_employee_id = $data['role_employee_id'];

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

        return redirect()->back()->withSuccess('แก้ไข Employee สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

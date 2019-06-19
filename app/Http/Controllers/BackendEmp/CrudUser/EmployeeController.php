<?php

namespace App\Http\Controllers\BackendEmp\CrudUser;

use App\Http\Requests\AdminCreateEmpRequest;
use App\Http\Requests\AdminEditEmpRequest;
use App\Models\Employee;
use App\Models\RoleEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
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
        $data = Employee::where('id', '!=', 1)
            ->get();
        return view ('backend-admin.employees.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_employees = RoleEmployee::where('id','!=',1)->get();
        return view('backend-admin.employees.create',compact('role_employees'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCreateEmpRequest $request)
    {

        $employee = new Employee();

        $employee->username = $request->username;
        $employee->password = Hash::make($request->password);
        $employee->email = $request->email;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->nickname = $request->nickname;
        $employee->id_card = $request->id_card;
        $employee->image = $request->image->store('uploads','public');
        $employee->phone_number = $request->phone_number;
        $employee->address = $request->address;
        $employee->role_employee_id = $request->role_employee_id;
        $employee->gender = $request->gender;

        $employee->save();

        return redirect()->route('employee.index')->with('success','เพิ่มข้อมูลพนักงานเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Employee::find($id);
        return view('backend-admin.employees.detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd($id);
        $role_employees = RoleEmployee::where('id','!=',1)->get();
        $data = Employee::find($id);
        return view('backend-admin.employees.edit',compact('data','role_employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditEmpRequest $request, $id)
    {
        $data = $request->all();

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

        if (empty($data['gender'])) {
            $user->gender = null;
        }else {
            $user->gender = $data['gender'];;
        }
        if (!empty($request->password)) {
            $newPassword = Hash::make($data['password']);
            $user->password  = $newPassword;
        }
        if (isset($data['image'])){
            Storage::delete('public/'.$user->image);
            $user->image = ($data['image'])->store('uploads','public');
        }

        $user->update();

        return redirect()->route('employee.index')->withSuccess('แก้ไข Employee สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->forceDelete();

        Storage::delete('public/'.$employee->image);

        return redirect()->route('employee.index')->with('deleted','ลบ Employee เรียบร้อย');

    }
}

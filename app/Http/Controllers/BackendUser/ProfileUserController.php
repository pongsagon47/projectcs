<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
    public function show($id)
    {

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
        $data = User::find($id);
        return view('backend-user.users.profile', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $id = auth()->user()->id;

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
        $user->status = '0';


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

        return redirect()->back()->withSuccess('แก้ไข User สำเร็จ');


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

<?php

namespace App\Http\Controllers\BackendUser;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function edit($id)
    {
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
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        $data['id_card'] = str_replace(" ", "", "$request->id_card");
        $data['phone_number'] = str_replace("-", "", "$request->phone_number");

        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->shop_name = $data['shop_name'];
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->nickname = $data['nickname'];
        $user->id_card = $data['id_card'];
        $editUser = [
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
            $editUser += ['gender' => null];
        }else {
            $editUser += ['gender' => $data['gender']];
        }

        $user->update($editUser);

        return redirect()->route('users.edit')->with('success','สร้าง User สำเร็จ');


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

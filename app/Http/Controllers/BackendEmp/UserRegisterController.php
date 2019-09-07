<?php

namespace App\Http\Controllers\BackendEmp;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserRegisterController extends Controller
{
    public function index()
    {
        $search = "";
        $users = User::query()->where('status',0)->paginate(5);;
        return view('backend-admin.user-register.index',compact('users','search'));
    }

    public function search(Request $request){

        $search = $request->search;
        if ($search == ""){
            $users = User::query()
                ->where('status','=','0')
                ->paginate(5);
            return view('backend-admin.user-register.index',compact('users','search'));
        }
        else{
            $users = User::query()
                ->where('status','=','0')
                ->where(DB::raw('concat(first_name," ",last_name)'),'LIKE','%'.$search.'%')
                ->paginate(5);
            $users->appends($request->only('search'));
            return view('backend-admin.user-register.index',compact('users','search'));
        }
    }

    public function show($id)
    {
        $data = User::find($id);
        return view('backend-admin.user-register.detail',compact('data'));
    }

    public function confirm($id)
    {
        $user = User::find($id);

        $user->status = 1;

        $user->update();
        return redirect()->route('user-register.index')->withSuccess('ยอมรับสมาชิกเรียบร้อย');
    }

}

<?php

namespace App\Http\Controllers\BackendEmp;

use App\Models\Intro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IntroController extends Controller
{
    public function create()
    {
        $intro = [];
        $oIntro = Intro::get();
        if ($oIntro->isNotEmpty()) {
            $intro = $oIntro;
        }
        return view('backend-admin.intro.index',compact('intro'));
    }

    public function store(Request $request)
    {
        if (!empty($request->id))
        {
            $intro = Intro::find($request->id);

            $intro->title = $request->title;
            $intro->description = $request->description;

            $intro->update();

            return redirect()->route('intro.create')->with('success','บันทึกข้อมูลเรียบร้อย');
        }
        else
        {
            $intro = new Intro();

            $intro->title = $request->title;
            $intro->description = $request->description;

            $intro->save();

            return redirect()->route('intro.create')->with('success','บันทึกข้อมูลเรียบร้อย');
        }
    }
}

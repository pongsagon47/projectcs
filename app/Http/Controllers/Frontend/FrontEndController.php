<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Intro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontEndController extends Controller
{

    public function index()
    {
        $about = About::all();
        $intro = Intro::all();
        return view('frontend.index.index ',compact('about','intro'));
    }


}

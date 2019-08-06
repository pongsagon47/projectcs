<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('frontend.about-us.index',compact('about'));
    }

}

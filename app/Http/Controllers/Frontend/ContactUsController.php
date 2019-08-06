<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('frontend.contact-us.index');
    }
}

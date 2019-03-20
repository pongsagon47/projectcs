<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeCotroller extends Controller
{
    public function __construct()
    {
        $this->middleware('employee:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend-admin.employee');
    }
}

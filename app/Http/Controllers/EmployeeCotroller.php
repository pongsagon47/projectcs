<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
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
        $userQty = User::all();
        $productQty = Product::all();
        $now = Carbon::now()->format('Y-m-d');
        $orderQty = Order::query()
            ->where('order_status','>=','0')
            ->where('order_status','<=','3')
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
            ->get();
        return view('backend-admin.employee',compact('userQty','productQty','orderQty'));
    }
}

<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTodayController extends Controller
{

    public function index()
    {
        $orders = Order::query()
            ->where('order_status','1')
            ->paginate('5');
        return view('backend-admin.merchant.order-today.index',compact('orders'));
    }
}

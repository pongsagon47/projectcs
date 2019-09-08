<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderTodayController extends Controller
{

    public function index()
    {
        $orders = Order::query()
            ->where('order_status','>=','1')
            ->where('order_status','<=','4')
            ->paginate('5');
        return view('backend-admin.merchant.order-today.index',compact('orders'));
    }

    public function show($id)
    {

        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-admin.merchant.order-today.detail',compact('order','orderDetails'));
    }
}

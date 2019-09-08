<?php

namespace App\Http\Controllers\BackendUser\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderStatusController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('user_id',Auth::user()->id)
            ->get();

        return view('backend-user.shop.status-order.index',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-user.shop.status-order.detail',compact('order','orderDetails'));
    }
}

<?php

namespace App\Http\Controllers\BackendUser\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderStatusController extends Controller
{
    public function index()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $orders = Order::query()
            ->where('user_id',Auth::user()->id)
            ->where('order_status','>=','0')
            ->where('order_status','<=','3')
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
            ->get();

        return view('backend-user.shop.status-order.index',compact('orders'));
    }

    public function bill($id)
    {
        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-user.shop.status-order.bill',compact('order','orderDetails'));
    }
}

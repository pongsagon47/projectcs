<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('order_status','4')
            ->paginate('5');
        return view('backend-admin.merchant.delivery.index',compact('orders'));
    }

    public function bill($id)
    {
        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-admin.merchant.delivery.bill',compact('order','orderDetails'));
    }

    public function aboutUser($id)
    {
        $data = User::find($id);
        return view('backend-admin.merchant.delivery.about_user', compact('data'));
    }

    public function success($id)
    {
        $order = Order::find($id);
        $order->order_status = 5;
        $order->update();
        return redirect()->route('delivery.index')->with('success','ส่งสินค้าสาขา '.$order->user->shop_name." เรียบร้อย");
    }
}

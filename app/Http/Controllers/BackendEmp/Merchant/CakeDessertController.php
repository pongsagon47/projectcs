<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CakeDessertController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('order_status','>=','1')
            ->where('order_status','<=','2')
            ->get();

        $arr_orders = [];
        foreach ($orders as $order)
        {
            $orderDetails = OrderDetail::query()
                ->where('role_employee_id',7)
                ->where('order_id',$order->id)
                ->get();

            $total_qty = 0;
            foreach ($orderDetails as $orderDetail )
            {
                $total_qty += $orderDetail->product_qty;
            }

            if ( $total_qty != 0)
            {
                array_push($arr_orders,array(
                    'order_id' => $order->id,
                    'shop_name' => $order->user->shop_name,
                    'user_type' => $order->user->role->name,
                    'total_qty' => $total_qty,
                    'created_at' =>$order->created_at
                ));
            }
        }
        return view('backend-admin.merchant.cake-dessert.index',compact('arr_orders'));
    }

    public function show($id)
    {

        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->where('role_employee_id',7)
            ->get();
        return view('backend-admin.merchant.cake-dessert.detail',compact('order','orderDetails'));
    }
}

<?php

namespace App\Http\Controllers\BackendUser\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\RoleEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index()
    {
        $role_employees = RoleEmployee::query()
            ->where('id','!=','1')
            ->where('id','!=','2')
            ->where('id','!=','3')
            ->get();

        return view('backend-user.shop.index',compact('role_employees'));
    }

    public function order(Request $request)
    {
        $orders = $request->all();

        $role_employees = RoleEmployee::query()
            ->where('id','!=','1')
            ->where('id','!=','2')
            ->where('id','!=','3')
            ->get();

        $order_Details = [];

        for( $i=0;$i<count($role_employees);$i++)
        {
            $role_employee = $role_employees[$i];
            $products = Product::query()
                ->where('role_employee_id',$role_employee->id)
                ->get();

            foreach( $products as $product)
            {
                if ($orders['product_qty_'.$product->id] != null)
                {
                    $qty = $orders['product_qty_'.$product->id];
                    $price = $orders['product_price_'.$product->id];

                    $total_price = $qty*$price;


                    array_push(
                        $order_Details,array(
                            'product_id' => $orders['product_id_'.$product->id],
                            'product_name' => $orders['product_name_'.$product->id],
                            'product_qty' => $orders['product_qty_'.$product->id],
                            'product_price' => $orders['product_price_'.$product->id] ,
                            'role_employee_id' => $orders['role_employee_'.$product->id] ,
                            'product_total_price' => $total_price ,
                        )
                    );
                }
            }
        }

        $sum_qty = 0;
        $sum_price = 0;
        foreach($order_Details as $order_Detail)
        {
            $sum_qty+= $order_Detail['product_qty'];
            $sum_price+= $order_Detail['product_total_price'];
        }

        return view('backend-user.shop.confirm',compact('order_Details','sum_price','sum_qty'));
    }

    public function store(Request $request)
    {

        $orders = ($request->all());

        array_shift($orders);

        $sum_qty = 0;
        $sum_price = 0;
        foreach($orders as $data)
        {
            $sum_qty+= $data['product_qty'];
            $sum_price+= $data['product_total_price'];
        }

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->total_price = $sum_price;
        $order->total_qty = $sum_qty;
        $order->order_status = 0;
        $order->save();

        for ($i = 0; $i < count($orders); $i++)
        {
            $order_detail = $orders[$i];

            $orderDetail = new OrderDetail;

            $orderDetail->order_id = $order->id;
            $orderDetail->role_employee_id = $order_detail['role_employee_id'];
            $orderDetail->product_id = $order_detail['product_id'];
            $orderDetail->product_qty = $order_detail['product_qty'];
            $orderDetail->product_total_price = $order_detail['product_total_price'];

            $order->orderDetails()->save($orderDetail);
        }

        return view('backend-user.shop.success');
    }

}

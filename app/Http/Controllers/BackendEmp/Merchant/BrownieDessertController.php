<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductionStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BrownieDessertController extends Controller
{

    public function index()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $orders = Order::query()
            ->where('order_status','>=','1')
            ->where('order_status','<=','3')
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
            ->get();

        foreach ($orders as $order)
        {
            $orderDetails = OrderDetail::query()
                ->where('role_employee_id',6)
                ->where('order_id',$order->id)
                ->get();

            $total_qty = 0;
            foreach ($orderDetails as $orderDetail )
            {
                $total_qty += $orderDetail->product_qty;
            }

            $order->total_qty = $total_qty;
        }
        return view('backend-admin.merchant.brownie-dessert.index',compact('orders'));
    }

    public function show($id)
    {

        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->where('role_employee_id',6)
            ->get();
        return view('backend-admin.merchant.brownie-dessert.detail',compact('order','orderDetails'));
    }

    public function confirm($id)
    {

        $productionStatus = ProductionStatus::find($id);

        $productionStatus->brownie_dessert = 1;

        $productionStatus->save();



        $thai_dessert = $productionStatus->thai_dessert;
        $role_dessert = $productionStatus->role_dessert;
        $brownie_dessert = $productionStatus->brownie_dessert;
        $cake_dessert = $productionStatus->cake_dessert;
        $cookie_dessert = $productionStatus->cookie_dessert;

        for ($i = 4;$i<=8;$i++)
        {
            $orderDetails = OrderDetail::query()
                ->where('role_employee_id',$i)
                ->where('order_id',$id)
                ->get();

            if (count($orderDetails)== 0)
            {
                if ($i == 4)
                {
                    $thaiDessert = "4";
                }
                if ($i == 5)
                {
                    $roleDessert = "4";
                }
                if ($i == 6)
                {
                    $brownieDessert = "4";
                }
                if ($i == 7)
                {
                    $cakeDessert = "4";
                }
                if ($i == 8)
                {
                    $cookieDessert = "4";
                }
            }else{
                if ($i == 4)
                {
                    $thaiDessert = "1";
                }
                if ($i == 5)
                {
                    $roleDessert = "1";
                }
                if ($i == 6)
                {
                    $brownieDessert = "1";
                }
                if ($i == 7)
                {
                    $cakeDessert = "1";
                }
                if ($i == 8)
                {
                    $cookieDessert = "1";
                }
            }
        }

        if ($thai_dessert == $thaiDessert )
        {
            if ($role_dessert == $roleDessert)
            {
                if ($brownie_dessert == $brownieDessert)
                {
                    if ($cake_dessert  == $cakeDessert)
                    {
                        if ( $cookie_dessert == $cookieDessert)
                        {
                            $order = Order::find($id);
                            $order->order_status = 2;
                            $order->update();

                        }
                    }
                }
            }
        }

        return redirect()->route('brownie-dessert.index')->with('success','รับรายการผลิตสาขา '.$productionStatus->order->user->shop_name.' เรียบร้อย');
    }

    public function dessertMaker()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $orderDetails = OrderDetail::query()
            ->select('product_id', DB::raw('sum(product_qty) as total'))
            ->groupBy('product_id')
            ->where('role_employee_id',6)
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
            ->orderBy('product_id')
            ->get();

        return view('backend-admin.merchant.brownie-dessert.dessert_maker',compact('orderDetails'));
    }

    public function orderSuccess($id)
    {
        $productionStatus = ProductionStatus::find($id);

        $productionStatus->brownie_dessert = 2;

        $productionStatus->save();

        $thai_dessert = $productionStatus->thai_dessert;
        $role_dessert = $productionStatus->role_dessert;
        $brownie_dessert = $productionStatus->brownie_dessert;
        $cake_dessert = $productionStatus->cake_dessert;
        $cookie_dessert = $productionStatus->cookie_dessert;

        for ($i = 4;$i<=8;$i++)
        {
            $orderDetails = OrderDetail::query()
                ->where('role_employee_id',$i)
                ->where('order_id',$id)
                ->get();

            if (count($orderDetails)== 0)
            {
                if ($i == 4)
                {
                    $thaiDessert = "4";
                }
                if ($i == 5)
                {
                    $roleDessert = "4";
                }
                if ($i == 6)
                {
                    $brownieDessert = "4";
                }
                if ($i == 7)
                {
                    $cakeDessert = "4";
                }
                if ($i == 8)
                {
                    $cookieDessert = "4";
                }
            }else{
                if ($i == 4)
                {
                    $thaiDessert = "2";
                }
                if ($i == 5)
                {
                    $roleDessert = "2";
                }
                if ($i == 6)
                {
                    $brownieDessert = "2";
                }
                if ($i == 7)
                {
                    $cakeDessert = "2";
                }
                if ($i == 8)
                {
                    $cookieDessert = "2";
                }
            }
        }

        if ($thai_dessert == $thaiDessert )
        {
            if ($role_dessert == $roleDessert)
            {
                if ($brownie_dessert == $brownieDessert)
                {
                    if ($cake_dessert  == $cakeDessert)
                    {
                        if ( $cookie_dessert == $cookieDessert)
                        {
                            $order = Order::find($id);
                            $order->order_status = 3;
                            $order->update();

                        }
                    }
                }
            }
        }
        return redirect()->route('brownie-dessert.index')->with('success', "รายการผลิต ".$productionStatus->order->user->shop_name." เสร็จแล้ว");
    }
}

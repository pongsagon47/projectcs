<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderConfirmController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('order_status','0')
            ->get();
        return view('backend-admin.merchant.order-confirm.index',compact('orders'));
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $promotions = Promotion::all();

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-admin.merchant.order-confirm.confirm',compact('order','orderDetails','promotions'));
    }

    public function editOrderDetail(Request $request)
    {

        if ($request->product_qty > 1000)
        {
            return redirect()->back()->with('error', 'จำนวน '.$request->product_name.' ต้องน้อยกว่า 1,000 ชิ้น');
        }
        else if ($request->product_qty < 1)
        {
            return redirect()->back()->with('error', 'จำนวน '.$request->product_name.' ต้องมากกว่า 1 ชิ้น');
        }
        else
        {
            $orderDetail_id = $request->orderDetail_id;
            $product_qty = $request->product_qty;
            $product_price = $request->product_price;
            $product_total_price = $request->product_total_price;
            $total_qty = $request->total_qty;
            $order_id = $request->order_id;

            $orderDetail = OrderDetail::find($orderDetail_id);

//            Code calculate total_qty in Table Orders
            $previous_total_qty = $orderDetail->product_qty;
            $previous_qty = $orderDetail->product_qty;
            $current_qty = $product_qty;
            $calculate_qty = $total_qty - $previous_qty;
            $sumQty = $current_qty + $calculate_qty;

//            End Code

            $orderDetail->product_qty = $product_qty;

//            Code calculate total_price in Table Orders
            $previous_price = $orderDetail->product_total_price;
            $current_price = $orderDetail->product_qty * $product_price;
            $sum = $product_total_price - $previous_price;
            $current_total_price = $sum + $current_price;
//            End Code


            echo "ค่ารวมเก่า ".$total_qty."<br>";
            echo "ค่าที่ส่งมา ".$product_qty."<br>";
            echo "ค่าที่รวมแถวเก่า ".$previous_total_qty."<br>";
            echo "ค่าที่รวมทั้งหมดใหม่ ".$sumQty."<hr>";

            echo "ราคารวมเดิม ".$previous_price."<br>";
            echo "ราคารวมใหม่ ".$current_price."<br>";
            echo "ราคารวมทั้งหมดเดิม ".$product_total_price."<br>";
            echo "ราคารวมทั้งหมดใหม่ ".$current_total_price."<hr>";

           $orderDetail->product_total_price = $current_price;
           $orderDetail->update();

           $order = Order::find($order_id);
           $order->total_qty = $sumQty;
           $order->total_price = $current_total_price;
           $order->update();

           return redirect()->route('order-confirm.confirm',[$order_id])->withSuccess('แก้ไขจำนวน '.$orderDetail->products->name." เรียบร้อย");
        }
    }

    public function destroy($id)
    {
        $orderDetail = OrderDetail::find($id);

//        Code calculate total_qty and total_price to current
        $totalQty_deleted = $orderDetail->order->total_qty - $orderDetail->product_qty;
        $totalPrice_deleted = $orderDetail->order->total_price - $orderDetail->product_total_price;
        $order_id = $orderDetail->order->id;
//        The End

        $order = Order::find($order_id);

        $order->total_price = $totalPrice_deleted;
        $order->total_qty = $totalQty_deleted;

        $order->update();

        $orderDetail->delete();

        return redirect()->route('order-confirm.confirm',[$orderDetail->order_id])->with('error', 'ลบรายการ '.$orderDetail->products->name." เรียบร้อย");
    }

    public function orderSuccess(Request $request, $id)
    {

        if ( $request->promotion_id == 0)
        {
            $discount = 0;

        }else{
            $promotion_id = $request->promotion_id;
            $promotion = Promotion::find($promotion_id);
            $discount = $promotion->promotion_discount;
        }

        $order = Order::find($id);

        $resultDivide = $order->total_price / 100;

        $total_price_discounted = $order->total_price - ($resultDivide * $discount);

        $order->employee_id = Auth::user()->id;
        $order->promotion_id = $promotion->id;
        $order->total_price_discounted = $total_price_discounted;
        $order->order_status = 1;

        $order->update();

        return redirect()->route('order-today.index')->withSuccess('อนุมัติรายการสั่งซื้อเรียบร้อย');

    }

}

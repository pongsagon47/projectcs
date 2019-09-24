<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductionStatus;
use App\Models\Promotion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderConfirmController extends Controller
{
    public function index()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $orders = Order::query()
            ->where('order_status','0')
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
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

            $order = Order::find($orderDetail->order_id);

            //Code notify Line send to employee order
            define('LINE_API',"https://notify-api.line.me/api/notify");

            $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
            $str = "มีการแก้ไขรายการสั่งซื้อของสาขา ".$order->user->shop_name." รายการที่แก้ไขคือ ".$orderDetail->products->name." จากจำนวน ".$previous_qty." ชิ้นเป็นจำนวน ".$current_qty." ชิ้น เนื่องจากไม่สามารถผลิตได้ตวามจำนวนที่สั่งมา ขออภัยในความไม่สะดวกค่ะ"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

            $res = $this->notify_message($str,$token);
//                print_r($res);
            //end code

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

        //Code notify Line send to employee order
        define('LINE_API',"https://notify-api.line.me/api/notify");

        $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
        $str = "มีการลบบางรายการสั่งซื้อของสาขา ".$order->user->shop_name." รายการที่ลบคือ ".$orderDetail->products->name." เนื่องจากวัตถุดิบที่นำมาผลิตรายการนี้หมด ขออภัยในความไม่สะดวกค่ะ"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $res = $this->notify_message($str,$token);
//                print_r($res);
        //end code



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

//        Code Add Production Status
        $productionStatus = ProductionStatus::find($id);

        for ($i = 4;$i<=8;$i++)
        {
            $orderDetails = OrderDetail::query()
                ->where('role_employee_id',$i)
                ->where('order_id',$order->id)
                ->get();

            if (count($orderDetails)== 0)
            {
                if ($i == 4)
                {
                    $productionStatus->thai_dessert = "4";
                }
                if ($i == 5)
                {
                    $productionStatus->role_dessert = "4";
                }
                if ($i == 6)
                {
                    $productionStatus->brownie_dessert = "4";
                }
                if ($i == 7)
                {
                    $productionStatus->cake_dessert = "4";
                }
                if ($i == 8)
                {
                    $productionStatus->cookie_dessert = "4";
                }
            }else{
                if ($i == 4)
                {
                    $productionStatus->thai_dessert = "0";
                }
                if ($i == 5)
                {
                    $productionStatus->role_dessert = "0";
                }
                if ($i == 6)
                {
                    $productionStatus->brownie_dessert = "0";
                }
                if ($i == 7)
                {
                    $productionStatus->cake_dessert = "0";
                }
                if ($i == 8)
                {
                    $productionStatus->cookie_dessert = "0";
                }
            }
        }

        $productionStatus->update();
//        End Code

        $order->update();

        //Code notify Line send to employee order
        define('LINE_API',"https://notify-api.line.me/api/notify");

        $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
        $str = "อนุมัติรายการสั่งซื้อของสาขา ".$order->user->shop_name." เรียบร้อย"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $res = $this->notify_message($str,$token);
//                print_r($res);
        //end code

        return redirect()->route('order-confirm.index')->withSuccess('อนุมัติรายการสั่งซื้อของ '.$order->user->shop_name.' เรียบร้อย');

    }

    public function destroyOrder($id)
    {
        $order = Order::find($id);

        $order_details = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        foreach ($order_details as $order_detail)
        {
            $orderDatail = OrderDetail::find($order_detail->id);

            $orderDatail->delete();
        }
        $production = ProductionStatus::find($id);
        $production->delete();

        $order->delete();

        //Code notify Line send to employee order
        define('LINE_API',"https://notify-api.line.me/api/notify");

        $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
        $str = "พนักงานออเดอร์ลบรายการสั่งซื้อของสาขา ".$order->user->shop_name." เรียบร้อย"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $res = $this->notify_message($str,$token);
//                print_r($res);
        //end code

        return redirect()->route('order-confirm.index')->with('deleted','ลบรายการสั่งซื้อเรียบร้อย');
    }

    function notify_message($message,$token){

        $queryData = array('message' => $message);

        $queryData = http_build_query($queryData,'','&');

        $headerOptions = array(
            'http'=>array(
                'method'=>'POST',
                'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".$token."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
                'content' => $queryData
            ),);

        $context = stream_context_create($headerOptions);
        file_get_contents(LINE_API,FALSE,$context);
//        $result = file_get_contents(LINE_API,FALSE,$context);
//        $res = json_decode($result);
//        return $res;
    }

}

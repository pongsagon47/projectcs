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
            ->where('order_status','<=','4')
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

    public function payDeposit($id)
    {
        $order = Order::find($id);
        return view('backend-user.shop.paypal.index',compact('order'));
    }

    public function deposit(Request $request, $id)
    {
        $this->validate($request,[
            'proof' => 'required|file|image|max:5000',
        ],[],[
            'proof' => 'หลักฐานการชำระเงิน',
        ]);

        $order = Order::find($id);
        if ($request->payment_status == 1)
        {
            $order->payment_status = $request->payment_status;
            $order->proof_of_deposit = ($request->proof)->store('uploads','public');
            $order->update();
            //Code notify Line send to employee order
            define('LINE_API',"https://notify-api.line.me/api/notify");

            $token = "zM9e3pulAskAEpVKwiGc5QGb6lY8xEXeeTFi0KIQ1vn"; //ใส่Token ที่copy เอาไว้
            $str = "ลูกค้าสาขา *".$order->user->shop_name."* ชำระค่ามัดจำเรียบร้อย ตรวจสอบ http://kidthuang-bekery.com/employee/orders-confirm"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

            $res = $this->notify_message($str,$token);
//                print_r($res);
            //end code
            return redirect()->route('order-status.index')->withSuccess('ชำระเงินค่ามัดจำเรียบร้อย');

        }elseif ( $order->order_status == 1&&$request->payment_status == 3)
        {
            $order->payment_status = $request->payment_status;
            $order->proof_of_payment =  ($request->proof)->store('uploads','public');
            $order->update();
            //Code notify Line send to employee order
            define('LINE_API',"https://notify-api.line.me/api/notify");

            $token = "zM9e3pulAskAEpVKwiGc5QGb6lY8xEXeeTFi0KIQ1vn"; //ใส่Token ที่copy เอาไว้
            $str = "ลูกค้าสาขา *".$order->user->shop_name."* ชำระเงินค่ารายการสั่งซื้อเรียบร้อย ตรวจสอบ http://kidthuang-bekery.com/employee/orders-confirm"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

            $res = $this->notify_message($str,$token);
//                print_r($res);
            //end code
            return redirect()->route('order-status.index')->withSuccess('ชำระเงินค่ารายการสั่งซื้อเรียบร้อย');

        }else
        {
            $order->payment_status = $request->payment_status;
            $order->proof_of_payment =  ($request->proof)->store('uploads','public');
            $order->update();
            //Code notify Line send to employee order
            define('LINE_API',"https://notify-api.line.me/api/notify");

            $token = "zM9e3pulAskAEpVKwiGc5QGb6lY8xEXeeTFi0KIQ1vn"; //ใส่Token ที่copy เอาไว้
            $str = "ลูกค้าสาขา *".$order->user->shop_name."* ชำระเงินค่ารายการสั่งซื้อเรียบร้อย ตรวจสอบ http://kidthuang-bekery.com/employee/order-today"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

            $res = $this->notify_message($str,$token);
//                print_r($res);
            //end code
            return redirect()->route('order-status.index')->withSuccess('ชำระเงินค่ารายการสั่งซื้อเรียบร้อย');
        }

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

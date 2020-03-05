<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductionStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class OrderTodayController extends Controller
{

    public function index()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $orders = Order::query()
            ->where('order_status','>=','2')
            ->where('order_status','<=','4')
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
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

    public function productionStatus()
    {
        //Time show just today Order
        $now = Carbon::now()->format('Y-m-d');
        $productions = ProductionStatus::query()
            ->where('created_at', '>=', $now.' 00:00:00')
            ->where('created_at', '<=', $now.' 23:59:59')
        ->get();

//        $productions = ProductionStatus::all();
        return view('backend-admin.merchant.order-today.production_status',compact('productions'));
    }

    public function proof($id)
    {
        $order = Order::find($id);
        return view('backend-admin.merchant.order-today.proof',compact('order'));
    }

    public function proofSuccess($id)
    {
        $order = Order::find($id);
        $order->payment_status = 4;
        $order->update();
        //Code notify Line send to employee order
        define('LINE_API',"https://notify-api.line.me/api/notify");

        $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
        $str = "ยืนยันการชำระเงินรายการสั่งซื้อของสาขา *".$order->user->shop_name."* เรียบร้อย"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $res = $this->notify_message($str,$token);
//                print_r($res);
        //end code
        return redirect()->route('order-today.index')->withSuccess('ยืนยันกาารชำระเงินรายการสั่งซื้อทั้งหมดของสาขา '.$order->user->shop_name.' เรียบร้อย');
    }

    public function destroyProof($id)
    {
        $order = Order::find($id);
        $order->payment_status = 2;
        $order->proof_of_payment = null;
        Storage::delete('public/'.$order->proof_of_payment);
        $order->update();
        //Code notify Line send to employee order
        define('LINE_API',"https://notify-api.line.me/api/notify");

        $token = "4YITeVVeWcL8pYKOogbrvA6uJCNCBey2niIjeAw1p8b"; //ใส่Token ที่copy เอาไว้
        $str = "มีการลบหลักฐานการชำระเงินรายการสั่งซื้อทั้งหมดของสาขา *".$order->user->shop_name."* _เนื่องจากหลักฐานการชำระเงินไม่ถูกต้อง กรุณาส่งหลักฐานใหม่อีกครั้งที่_ http://kidthuang-bekery.com/user/order-status"; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร

        $res = $this->notify_message($str,$token);
//                print_r($res);
        //end code

        return redirect()->route('order-today.index')->with('error', 'ลบหลักฐานการชำระเงินของ '.$order->user->shop_name." เรียบร้อย");
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

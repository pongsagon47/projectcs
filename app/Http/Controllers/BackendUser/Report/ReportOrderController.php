<?php

namespace App\Http\Controllers\BackendUser\Report;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportOrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()
            ->where('user_id',Auth::user()->id)
            ->where('order_status','5')
            ->get();

        return view('backend-user.report.report-order.index',compact('orders'));
    }

    public function bill($id)
    {
        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-user.report.report-order.bill',compact('order','orderDetails'));
    }
}

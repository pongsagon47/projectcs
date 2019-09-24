<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductionStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class OrderTodayController extends Controller
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
}

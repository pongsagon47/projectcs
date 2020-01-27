<?php

namespace App\Http\Controllers\BackendEmp\Report;

use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ReportSalesRevenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateStart ="";
        $dateEnd = "";
        $orders = Order::query()
            ->where('order_status','4')
            ->paginate('10');
        return view('backend-admin.report.sales-revenue.index',compact('orders','dateStart','dateEnd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
//        dd($request->all());
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;
        if ($dateStart == null && $dateEnd == null)
        {
            $orders = Order::query()
                ->where('order_status','4')
                ->paginate('10');
            return view('backend-admin.report.sales-revenue.index',compact('orders','dateStart','dateEnd'));
        }else
        {
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orders = Order::query()
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->where('order_status','4')
                ->paginate('10');

            $orders->appends(Input::except('page'));

            $dateStart = date('d/m/Y',strtotime($dateStartQ)) ;
            $dateEnd = date('d/m/Y',strtotime($dateEndQ.'- 1 days')) ;

            return view('backend-admin.report.sales-revenue.index',compact('orders','dateEnd','dateStart'));
        }


    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        $orderDetails = OrderDetail::query()
            ->where('order_id',$id)
            ->get();

        return view('backend-admin.report.sales-revenue.detail',compact('order','orderDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\BackendEmp\Report;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportBrachStoreController extends Controller
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
            ->select('user_id',DB::raw('sum(total_qty) as total_qty'),DB::raw('sum(total_price_discounted) as total_price_discounted'))
            ->groupBy('user_id')
            ->where('order_status','5')
            ->get();
        return view('backend-admin.report.branch-store-sales.index',compact('orders','dateStart','dateEnd'));
    }
    public function search(Request $request)
    {
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;
        if ($dateStart == null && $dateEnd == null)
        {
            $orders = Order::query()
                ->select('user_id',DB::raw('sum(total_qty) as total_qty'),DB::raw('sum(total_price_discounted) as total_price_discounted'))
                ->groupBy('user_id')
                ->where('order_status','5')
                ->get();
            return view('backend-admin.report.branch-store-sales.index',compact('orders','dateStart','dateEnd'));
        }else
        {
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orders = Order::query()
                ->select('user_id',DB::raw('sum(total_qty) as total_qty'),DB::raw('sum(total_price_discounted) as total_price_discounted'))
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->groupBy('user_id')
                ->where('order_status','5')
                ->get();

            $dateStart = date('Y/m/d',strtotime($dateStartQ)) ;
            $dateEnd = date('Y/m/d',strtotime($dateEndQ.'- 1 days')) ;

            return view('backend-admin.report.branch-store-sales.index',compact('orders','dateStart','dateEnd'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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

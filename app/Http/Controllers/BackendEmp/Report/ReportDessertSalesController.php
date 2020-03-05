<?php

namespace App\Http\Controllers\BackendEmp\Report;

use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ReportDessertSalesController extends Controller
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
        $orderDetails = OrderDetail::query()
            ->select('product_id',DB::raw('sum(product_qty) as total_qty'),DB::raw('sum(product_total_price) as total_price'))
            ->groupBy('product_id')
            ->orderBy('total_price','desc')
            ->get();
        return view('backend-admin.report.dessert-sales.index',compact('orderDetails','dateStart','dateEnd'));
    }
    public function search(Request $request)
    {
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;
        if ($dateStart == null && $dateEnd == null)
        {
            $orderDetails = OrderDetail::query()
                ->select('product_id',DB::raw('sum(product_qty) as total_qty'),DB::raw('sum(product_total_price) as total_price'))
                ->groupBy('product_id')
                ->orderBy('total_price')
                ->get();
            return view('backend-admin.report.dessert-sales.index',compact('orderDetails','dateStart','dateEnd'));
        }else
        {
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orderDetails = OrderDetail::query()
                ->select('product_id',DB::raw('sum(product_qty) as total_qty'),DB::raw('sum(product_total_price) as total_price'))
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->groupBy('product_id')
                ->orderBy('total_price')
                ->get();


            $dateStart = date('Y/m/d',strtotime($dateStartQ)) ;
            $dateEnd = date('Y/m/d',strtotime($dateEndQ.'- 1 days')) ;

            return view('backend-admin.report.dessert-sales.index',compact('orderDetails','dateStart','dateEnd'));
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

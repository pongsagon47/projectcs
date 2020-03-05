<?php

namespace App\Http\Controllers\BackendEmp\Report;

use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ReportProductionListController extends Controller
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
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(product_qty) as total'))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->paginate(10);

        return view('backend-admin.report.dessert-production-list.index',compact('orderDetails','dateStart','dateEnd'));
    }

    public function search(Request $request)
    {
//        dd($request->all());
        $dateStart = $request->dateStart;
        $dateEnd = $request->dateEnd;

        if ($dateStart == null && $dateEnd == null)
        {
            $orderDetails = OrderDetail::query()
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(product_qty) as total'))
                ->groupBy(DB::raw('DATE(created_at)'))
                ->paginate(10);

            return view('backend-admin.report.dessert-production-list.index',compact('orderDetails','dateStart','dateEnd'));
        }else
        {
            $dateStartQ = date('Y/m/d',strtotime($request->dateStart)) ;
            $dateEndQ = date('Y/m/d',strtotime($request->dateEnd.'+ 1 days')) ;

            $orderDetails = OrderDetail::query()
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('sum(product_qty) as total'))
                ->groupBy(DB::raw('DATE(created_at)'))
                ->whereBetween('created_at',[$dateStartQ,$dateEndQ])
                ->paginate(10);

            $orderDetails->appends(Input::except('page'));

            $dateStart = date('Y/m/d',strtotime($dateStartQ)) ;
            $dateEnd = date('Y/m/d',strtotime($dateEndQ.'- 1 days')) ;

            return view('backend-admin.report.dessert-production-list.index',compact('orderDetails','dateStart','dateEnd'));
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
    public function show($date)
    {
//        dd($date);
//        $now = Carbon::now()->format('Y-m-d');
        $orderDetails = OrderDetail::query()
            ->select('product_id', DB::raw('sum(product_qty) as total'))
            ->groupBy('product_id')
            ->where('created_at', '>=', $date.' 00:00:00')
            ->where('created_at', '<=', $date.' 23:59:59')
            ->orderBy('product_id')
            ->get();
        return view('backend-admin.report.dessert-production-list.detail',compact('orderDetails'));

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

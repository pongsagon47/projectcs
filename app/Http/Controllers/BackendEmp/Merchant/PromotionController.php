<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::paginate(5);;
        return view('backend-admin.merchant.promotion.index',compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-admin.merchant.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'promotion_name' => 'required|string|max:255|unique:promotions,promotion_name',
            'promotion_description' => 'required|string|max:255',
            'promotion_discount' => 'required|numeric|max:100',
        ],[],[
            'promotion_name' => 'ชื่อโปรโมชั่น',
            'promotion_description' => 'คำอธิบายโปรโมชั่น',
            'promotion_discount' => 'ส่วนลด'
        ]);

        $promotion = new Promotion;

        $promotion->promotion_name = $request->promotion_name;
        $promotion->promotion_description = $request->promotion_description;
        $promotion->promotion_discount = $request->promotion_discount;

        $promotion->save();

        return redirect()->route('promotion.index')->withSuccess('เพิ่มโปรโมชั่นเรียบร้อย');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::find($id);
        return view('backend-admin.merchant.promotion.edit',compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'promotion_name' => 'required|string|max:255|unique:promotions,promotion_name,'. $id,
            'promotion_description' => 'required|string|max:255',
            'promotion_discount' => 'required|numeric|max:100',
        ],[],[
            'promotion_name' => 'ชื่อโปรโมชั่น',
            'promotion_description' => 'คำอธิบายโปรโมชั่น',
            'promotion_discount' => 'ส่วนลด'
        ]);

        $promotion = Promotion::find($id);

        $promotion->promotion_name = $request->promotion_name;
        $promotion->promotion_description = $request->promotion_description;
        $promotion->promotion_discount = $request->promotion_discount;

        $promotion->update();

        return redirect()->route('promotion.index')->withSuccess('แก้ไขโปรโมชั่นเรียบร้อย');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::find($id);

        $promotion->delete();

        return redirect()->route('promotion.index')->with('deleted','ลบโปรโมชั่นเรียบร้อย');


    }
}

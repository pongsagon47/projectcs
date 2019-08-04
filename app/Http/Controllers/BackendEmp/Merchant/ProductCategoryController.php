<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_categories = ProductCategory::all();
        return view('backend-admin.merchant.product-category.index',compact('product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend-admin.merchant.product-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,['title' => 'required|unique:product_categories,title'],[],[ 'title' => ' ประเภทขนม']);

        $product_category = new ProductCategory(
            [
                'title' => $request->get('title')
            ]
        );

        $product_category->save();
        return redirect()->route('product_category.index')->with('success','บันทึกข้อมูลเรียบร้อย');
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
        $data = ProductCategory::find($id);
        return view('backend-admin.merchant.product-category.edit',compact('data'));

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
        $this->validate($request,['title' => 'required|unique:product_categories,title,'.$id],[],[ 'title' => ' ประเภทขนม']);

        $product_category = ProductCategory::find($id);

        $product_category->title = $request->get('title');

        $product_category->update();

        return redirect()->route('product_category.index')->with('success','แก้ไขข้อมูลเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product_category = ProductCategory::find($id);

        $product_category->forceDelete();

        return redirect()->route('product_category.index')->with('deleted','แก้ไขข้อมูลเรียบร้อย');
    }
}

<?php

namespace App\Http\Controllers\BackendEmp\Merchant;

use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\RoleEmployee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = "";
        $products = Product::paginate(10);
        return view('backend-admin.merchant.product.index',['products' => $products,'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role_employees = RoleEmployee::query()
            ->where('id','!=','1')
            ->where('id','!=','2')
            ->where('id','!=','3')
            ->get();
        return view('backend-admin.merchant.product.create',compact('role_employees'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        if ($search == ""){
            $products = Product::paginate(10);
            return view('backend-admin.merchant.product.index',['products' => $products,'search' => $search]);
        }
        else{
            $products = Product::where('name','LIKE','%'.$request->search.'%')
                ->paginate(10);
            $products->appends($request->only('search'));
            return view('backend-admin.merchant.product.index',compact('products','search'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->role_employee_id = $request->role_employee_id;
        $product->image = $request->image->store('uploads','public');
        $product->description = $request->description;

        $product->save();
        return redirect()->route('product.index')->with('success','เพิ่มสินค้าเรียบร้อย');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        return view('backend-admin.merchant.product.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role_employees = RoleEmployee::query()
            ->where('id','!=','1')
            ->where('id','!=','2')
            ->where('id','!=','3')
            ->get();
        $data = Product::find($id);
        return view('backend-admin.merchant.product.edit',compact('data','role_employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, $id)
    {
        $data = $request->all();

        $product = Product::find($id);

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->role_employee_id = $data['role_employee_id'];
        $product->description = $data['description'];

        if (isset($data['image'])){
            Storage::delete('public/'.$product->image);
            $product->image = ($data['image'])->store('uploads','public');
        }

        $product->update();

        return redirect()->route('product.index')->withSuccess('แก้ไข '.$product->name.' เรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->forceDelete();
        Storage::delete('public/'.$product->image);

        return redirect()->route('product.index')->with('deleted','ลบสินค้าเรียบร้อย');
    }
}

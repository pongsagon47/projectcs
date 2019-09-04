<?php

namespace App\Http\Controllers\BackendUser\Merchant;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::all();

//        $products = Product::query()->orderBy('product_category_id', 'asc')->get();


        return view('backend-user.shop.index',compact('product_categories'));
    }

    public function order(Request $request)
    {
        $orders = $request->all();

        $product_categories = ProductCategory::all();

        $order_Details = [];

        for( $i=0;$i<count($product_categories);$i++)
        {
            $product_category = $product_categories[$i];
            $products = Product::query()
                ->where('product_category_id',$product_category->id)
                ->get();

            foreach( $products as $product)
            {
                if ($orders['product_qty_'.$product->id] != null)
                {

                    $qty = $orders['product_qty_'.$product->id];
                    $price = $orders['product_price_'.$product->id];

                    $total_price = $qty*$price;

                    array_push(
                        $order_Details,array(
                            'product_id' => $orders['product_id_'.$product->id],
                            'product_name' => $orders['product_name_'.$product->id],
                            'product_qty' => $orders['product_qty_'.$product->id],
                            'product_price' => $total_price ,
                        )
                    );
                }
            }
        }

        $sum_qty = 0;
        $sum_price = 0;
        foreach($order_Details as $order_Detail)
        {
            $sum_qty+= $order_Detail['product_qty'];
            $sum_price+= $order_Detail['product_price'];
        }

        return view('backend-user.shop.confirm',compact('order_Details','sum_price','sum_qty'));
    }
}

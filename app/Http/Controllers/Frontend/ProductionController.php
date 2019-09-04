<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductionController extends Controller
{
    public function index()
    {
        $productions = Product::all();
        return view('frontend.production.index',compact('productions'));
    }

    public function detail($id)
    {
        $production = Product::find($id);
        return view('frontend.production.detail',compact('production'));
    }

}

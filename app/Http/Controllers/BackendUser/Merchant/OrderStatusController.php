<?php

namespace App\Http\Controllers\BackendUser\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderStatusController extends Controller
{
    public function index()
    {
        return view('backend-user.shop.status-order.index');
    }
}

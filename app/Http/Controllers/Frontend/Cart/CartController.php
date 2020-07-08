<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart.cart');
    }

    public function checkout()
    {
        return view('frontend.cart.checkout');
    }

    public function complete()
    {
        return view('frontend.cart.complete');
    }
}

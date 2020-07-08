<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        return view('frontend.product.shop');
    }

    public function detail()
    {
        return view('frontend.product.detail');
    }
}

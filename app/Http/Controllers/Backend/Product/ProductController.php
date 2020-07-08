<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // products
    public function list_product()
    {
        return view('backend.products.listproduct');
    }

    public function add_product()
    {
        return view('backend.products.addproduct');
    }

    public function store_product(ProductRequest $request)
    {
        echo 'ấdf';
    }

    public function edit_product()
    {
        return view('backend.products.editproduct');
    }

    public function del_product()
    {
        
    }
}

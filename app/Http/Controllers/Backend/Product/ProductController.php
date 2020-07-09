<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\editProductRequest;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function list_product()
    {
        $products = ProductsModel::all();
        return view('backend.products.listproduct', ['products' => $products]);
    }

    public function add_product()
    {
        $categories = CategoryModel::all();
        return view('backend.products.addproduct', ['categories' => $categories]);
    }

    public function store_product(ProductRequest $request)
    {
        $product = new ProductsModel();
        $product['category_id'] = $request->category;
        $product['code'] = $request->code;
        $product['name'] = $request->name;
        $product['price'] = $request->price;
        $product['featured'] = $request->featured;
        $product['state'] = $request->state;
        // upload ảnh
        $get_img = $request->file('img');
        $get_name_img = $get_img->getClientOriginalName();
        $name_first_img = current(explode(".", $get_name_img))." ".rand(0, 1000);
        $new_name_img = $name_first_img.".".$get_img->getClientOriginalExtension();
        $get_img->move("public/img", $new_name_img);
        // end upload ảnh
        $product['img'] = $new_name_img;
        $product['info'] = $request->info;
        $product['description'] = $request->describe;
        $product->save();
        return redirect()->route('product.index');
    }

    public function edit_product($id)
    {
        $product = ProductsModel::find($id);
        $categories = CategoryModel::all();
        return view('backend.products.editproduct', ['product' => $product, 'categories' => $categories]);
    }

    public function save_product(editProductRequest $request, $id)
    {
        $product = ProductsModel::find($id);
        $product['category_id'] = $request->category;
        $product['code'] = $request->code;
        $product['name'] = $request->name;
        $product['price'] = $request->price;
        $product['featured'] = $request->featured;
        $product['state'] = $request->state;
        // upload ảnh
        $get_img = $request->file('img');
        if ($get_img) {
            $get_name_img = $get_img->getClientOriginalName();
            $name_first_img = current(explode(".", $get_name_img))." ".rand(0, 1000);
            $new_name_img = $name_first_img.".".$get_img->getClientOriginalExtension();
            $get_img->move("public/img", $new_name_img);
            $product['img'] = $new_name_img;
        }else{
            $product['img'] = $product['img'];
        }
        // end upload ảnh
        $product['info'] = $request->info;
        $product['description'] = $request->describe;
        $product->save();
        return redirect()->route('product.index');

    }

    public function del_product($id)
    {
        $product = ProductsModel::find($id);
        $product->delete();
        return redirect()->route('product.index');
    }

    public function active_product($id)
    {
        $product = ProductsModel::find($id);
        if ($product["state"] == 0) {
            $product["state"] = 1;
        }
        $product->save();
        return redirect()->route('product.index');
    }
    public function deactive_product($id)
    {
        $product = ProductsModel::find($id);
        if ($product["state"] == 1) {
            $product["state"] = 0;
        }
        $product->save();
        return redirect()->route('product.index');
    }
}

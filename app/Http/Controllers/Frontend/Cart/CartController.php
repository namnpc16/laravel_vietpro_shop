<?php

namespace App\Http\Controllers\Frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\OrdersModal;
use Illuminate\Http\Request;
use App\Models\ProductsModel;
use App\Models\OrderProductsModel;
use Illuminate\Support\Facades\DB;
use Cart;
// use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cart()
    {
        $data['cart'] = Cart::content();
        
        return view('frontend.cart.cart', $data);
    }

    public function checkout()
    {
        $data['cart'] = Cart::content();

        return view('frontend.cart.checkout', $data);
    }

    public function complete()
    {
        return view('frontend.cart.complete');
    }

    public function create(Request $request)
    {

        $product = ProductsModel::find($request->id_product);
        
        Cart::add([
            'id' => $product->code,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['img' => $product->img]
        ]);
        
       return redirect()->route('cart');
    }

    public function update($id, $qty)
    {
        Cart::update($id, $qty); 

        return 'success';
    }

    public function delete($id)
    {
        Cart::remove($id);

        return redirect()->route('cart');
    }

    public function success(Request $request)
    {
        
        $data = new OrdersModal();
        $data['name'] = $request->name;
        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['state'] = 2;
        $data['total'] = str_replace(',', '', Cart::total());
        
        $data->save();
        
        $this->productOrder($data->id);
        
        return redirect()->route('complete');   
    }

    public function productOrder($id)
    {
        $carts = Cart::content();
        
        foreach ($carts as $key => $value) {
            $data1 = new OrderProductsModel();
            $data1['code'] = $value->id;
            $data1['quantity'] = $value->qty;
            $data1['name'] = $value->name;
            $data1['price'] = $value->price;
            $data1['img'] = $value->options->img;
            $data1['order_id'] = $id;
            
            $data1->save();
            Cart::destroy();
        }
    }
}

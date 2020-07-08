<?php

namespace App\Http\Controllers\Backend\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
       // Order
       public function orders()
       {
           return view('backend.orders.order');
       }
   
       public function order_detail()
       {
           return view('backend.orders.detailorder');
       }
   
       public function process()
       {
           return view('backend.orders.processed');
       }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProductsModel extends Model
{
    protected $table = "products_order";

    protected $fillable = ['code', 'name', 'price', 'quantity', 'img', 'order_id'];

    // public function order_products()
    // {
    //     return $this->belongsTo(OrdersModal::class, 'order_id', 'id');
    // }
}

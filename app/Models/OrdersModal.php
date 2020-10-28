<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModal extends Model
{
    protected $table = "orders";

    protected $fillable = ['name', 'address', 'email', 'phone', 'total', 'state'];

    public function order_products()
    {
        return $this->hasMany(OrderProductsModel::class, 'order_id', 'id');
    }
}

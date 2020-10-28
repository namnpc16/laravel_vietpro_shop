<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";

    protected $fillable = [
        'category_id',
        'code',
        'name',
        'price',
        'featured',
        'state',
        'slug',
        'info',
        'description',
        'img'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
        // return $this->belongsTo(CategoryModel::class, 'khóa ngoại', 'id của bảng cần kết nối');
    }

    // public function Orders()
    // {
    //     return $this->belongsToMany(OrdersModal::class, 'OrderProductsModel', 'id', 'order_id');
    // }

}

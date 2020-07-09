<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $table = "products";

    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
        // return $this->belongsTo(CategoryModel::class, 'khóa ngoại', 'id của bảng cần kết nối');
    }
}

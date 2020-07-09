<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(ProductsModel::class, 'category_id', 'id');
        // return $this->hasMany(ProductsModel::class, 'khóa ngoại', 'khóa chính');
    }
}

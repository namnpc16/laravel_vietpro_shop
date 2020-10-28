<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class CategoryRepository extends EloquentRepository
{
    /**
     * Get model 
     * @return string
     */
    public function getModel()
    {
        return \App\Models\CategoryModel::class;
    }

}
<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
     * Get model 
     * @return string
     */
    public function getModel()
    {
        return \App\Models\UsersModel::class;
    }
}
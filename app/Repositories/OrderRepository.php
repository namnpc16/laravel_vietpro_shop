<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class OrderRepository extends EloquentRepository
{
    /**
     * Get model 
     * @return string
     */
    public function getModel()
    {
        return \App\Models\OrdersModal::class;
    }

    /**
     * Get all order ( state = 2 )
     * 
     * @return Collection
     */
    public function allOrder()
    {
        return $this->_model->where('state', 2)->paginate(5);
    }

    /**
     * Get all order ( state = 1 )
     * 
     * @return Collection
     */
    public function allOrderProcess()
    {
        return $this->_model->where('state', 1)->paginate(5);
    }
}
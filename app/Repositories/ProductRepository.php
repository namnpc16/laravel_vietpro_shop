<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class ProductRepository extends EloquentRepository
{
    /**
     * Get model 
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ProductsModel::class;
    }

    /* --------------------Admin-------------------- */

    /**
     * Active and Deactive product
     * 
     * @param int @id
     * @return mixed
     */
    public function status($id)
    {
        $product = $this->_model->find($id);

        if ($product['state'] == 0) {
            $product['state'] = 1;

            return $product->save();
        }

        if ($product['state'] == 1) {
            $product['state'] = 0;

            return $product->save();
        }
    }
}
<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class FrontendRepository extends EloquentRepository
{
    /**
     * Get model 
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ProductsModel::class;
    }

    /**
     * Get product new
     * 
     * @param int $record
     * @return Collection
     */
    public function allProductsNew($record)
    {
        return $this->_model->take($record)->latest()->get();
    }

    /**
     * Get product featured
     * 
     * @return Collection
     */
    public function allProductsFeatured()
    {
        return $this->_model->where('featured', 1)->latest()->take(4)->get();
    }

    /* --------------------Frontend-------------------- */

    /**
     * Show product shop
     * 
     * @param array $filter
     * @return Collection
     */
    public function productShop(array $filter)
    {
        $min = $filter['min'];
        $max = $filter['max'];

        $result = $this->_model->when( $min, function ($query, $min) {
                                    return $query->where('price', '>=',$min);
                                })
                                ->when( $max, function ($query, $max) {
                                    return $query->where('price', '<=',$max);
                                })
                                ->latest()->paginate(6);

        return $result;
    }

    /**
     * Detail product
     * 
     * @param string $slug
     * @return Collection
     */
    public function productDetail($slug)
    {
        return $this->_model->where('slug', $slug)->first();
    }
}

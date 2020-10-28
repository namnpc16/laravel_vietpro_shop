<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\FrontendRepository;

class ProductController extends Controller
{
    /**
     * CategoryRepository
     * FrontendRepository
     * 
     * @var $categoryRepository
     * @var $frontendRepository
     */
    protected $categoryRepository, $frontendRepository;

    /**
     * Create new construct 
     * 
     * @param CategoryRepository $categoryRepository
     * @param FrontendRepository $frontendRepository
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository, FrontendRepository $frontendRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->frontendRepository = $frontendRepository;
    }

    /**
     * Show product shop
     * 
     * @param Request $request
     * @return View
     */
    public function shop(Request $request)
    {
        $request->flash();

        $filter['min'] = $request->input('start', 0);
        $filter['max'] = $request->input('end', 0);
        
        $data['categories'] = $this->categoryRepository->allCategory();
        $data['products'] = $this->frontendRepository->productShop($filter);

        return view('frontend.product.shop', $data);
    }

    /**
     * Detail product
     * 
     * @param string $slug
     * @return View
     */
    public function detail($slug)
    {
        $record = 4;

        $data['product'] = $this->frontendRepository->productDetail($slug);
        $data['new_products'] = $this->frontendRepository->allProductsNew($record);

        return view('frontend.product.detail', $data);
    }
}

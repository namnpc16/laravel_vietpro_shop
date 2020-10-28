<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\FrontendRepository;

class FrontendController extends Controller
{
    /**
     * FrontendRepository
     * @var $frontendRepository
     */
    protected $frontendRepository;

    /**
     * Create new construct 
     * 
     * @param FrontednRepository $frontendRepository
     * @return void
     */
    public function __construct(FrontendRepository $frontendRepository)
    {
        $this->frontendRepository = $frontendRepository;
    }

    /**
     * Home page
     * 
     * @return View
     */
    public function index()
    {
        $record = 8;

        $data['new'] = $this->frontendRepository->allProductsNew($record);
        $data['featured'] = $this->frontendRepository->allProductsFeatured();

        return view('frontend.index', $data);
    }
    
    /**
     * About page
     * 
     * @return View
     */
    public function about()
    {
        return view('frontend.about.about');
    }
    /**
     * Contact page
     * 
     * @return View
     */
    public function contact()
    {
        return view('frontend.contact.contact');
    }
}

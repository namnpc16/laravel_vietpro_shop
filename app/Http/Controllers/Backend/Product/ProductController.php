<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\{ ProductRequest, EditProductRequest, RepositoryInterface };
use App\Repositories\{ ProductRepository, CategoryRepository };
use Illuminate\Support\Str;
use App\Http\Uploads\ProductService;

class ProductController extends Controller
{
    /**
     * Products Repository
     * @var $productRepository
     * 
     * Categories Repository 
     * @var $categoryRepository
     */
    protected $productRepository, $categoryRepository;

    /**
     * Create new controller
     * 
     * @param ProductRepository $productRepository
     * @param CategoryRepository $categoryRepository
     * @return void
     */
    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /*--------------------Config--------------------*/

    /**
     * Generate slug product
     * 
     * @param string $slug
     * @return String
     */
    private function slug($slug)
    {
        return Str::slug($slug . ' ' . time(), '-');
    }    

    /*-------------------EndConfig-------------------*/

    /**
     * Get all
     * 
     * @return View
     */
    public function all()
    {
        return view('backend.products.listproduct', ['products' => $this->productRepository->all()]);
    }

    /**
     * Create product
     * 
     * @return View
     */
    public function create()
    {
        return view('backend.products.addproduct', ['categories' => $this->categoryRepository->all()]);
    }

    /**
     * Store product
     * 
     * @param ProductRequest $request
     * @return Redirect
     */
    public function store(ProductRequest $request)
    {
        $image = ProductService::upLoadImage($request->file('img'));
        $product = $request->all();
        $product['slug'] = $this->slug($request->name);
        $product['img'] = $image;
        $this->productRepository->create($product);

        return redirect()->route('product.index')->with('success', __('message.product.create', ['name' => 'sản phẩm']));
    }

    /**
     * Edit product
     * 
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $data['product'] = $this->productRepository->find($id);
        $data['categories'] = $this->categoryRepository->all();

        return view('backend.products.editproduct', $data);
    }

    /**
     * Update product
     * 
     * @param EditProductRequest $request
     * @param int $id
     * @return Redirect
     */
    public function save(EditProductRequest $request, $id)
    {
        $product = $request->all();
        $image = ProductService::upLoadEditImage($request->file('img'), $id);
        $product['slug'] = $this->slug($request->name);
        $product['img'] = $image;
        $this->productRepository->update($product, $id);

        return redirect()->route('product.index')->with('success', __('message.product.update', ['name' => 'sản phẩm']));
    }

    /**
     * Delete product
     * 
     * @param int $id
     * @return Redirect
     */
    public function delete($id)
    {
        $delete = $this->productRepository->find($id);
        ProductService::destroyImage($delete);
        $this->productRepository->delete($id);

        return redirect()->route('product.index')->with('success', __('message.product.delete', ['name' => 'sản phẩm']));
    }

    /**
     * Active and Deactive product
     * 
     * @param int $id
     * @return Redirect
     */
    public function status($id)
    {
        $this->productRepository->status($id);

        return redirect()->route('product.index')->with('success', __('message.product.state', ['name' => 'sản phẩm']));
    }
}

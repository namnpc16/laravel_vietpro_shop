<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * CategoryRepository
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * Create new construct 
     * 
     * @param CategoryRepository $categoryRepository
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Get all category
     * 
     * @return View
     */
    public function all()
    {
        return view('backend.categories.category', ['categories' => $this->categoryRepository->allCategory()]);
    }

    /**
     * Create one
     * 
     * @param AddCategoryRequest $request
     * @return Redirect
     */
    public function create(AddCategoryRequest $request)
    {
        $category = $request->all();
        $category['slug'] = Str::slug($request->name . ' ' . time(), '-');
        $this->categoryRepository->create($category);

        return redirect()->route('category.index')->with('success', __('message.category.create', ['name' => 'danh mục']));
    }

    /**
     * Edit category
     * 
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $data['categories'] = $this->categoryRepository->all();
        $data['category'] = $this->categoryRepository->find($id);

        return view('backend.categories.editcategory', $data);
    }

    /**
     * Update category
     * 
     * @param Request $request
     * @param int $id
     * 
     * @return Redirect
     */
    public function save(Request $request ,$id)
    {
        $category = $request->all();
        $category['slug'] = Str::slug($request->name . ' ' . time(), '-');
        $this->categoryRepository->update($category, $id);
      
        return redirect()->route('category.index')->with('success', __('message.category.update', ['name' => 'danh mục']));
    }
    
    /**
     * Delete category
     * 
     * @param int $id
     * @return Redirect 
     */
    public function delete($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('category.index')->with('success', __('message.category.delete', ['name' => 'danh mục']));
    }
}

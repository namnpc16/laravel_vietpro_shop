<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
        // category
        public function list_category()
        {
            $categories = CategoryModel::all();

            // echo "<pre>";
            // print_r($category);
            // echo "</pre>";
            return view('backend.categories.category', ['categories' => $categories]);
        }
    
        public function add_category(Request $request)
        {
            $category = new CategoryModel();
            $category['name'] = $request->name_category;
            $category['parent'] = $request->parent_id;
            $category->save();
            Session::put('success', '');
            return redirect()->route('category.index');
        }
    
        public function edit_category($id)
        {
            $categories = CategoryModel::all();
            $category = CategoryModel::find($id);
            return view('backend.categories.editcategory', ['categories' => $categories, 'cates' => $category]);
        }
    
        public function save_category(Request $request ,$id)
        {
            $category = CategoryModel::find($id);
            $category['name'] = $request->name;
            $category['parent'] = $request->parent;
            $category->save();
            return redirect()->route('category.index');
        }
        public function del_category($id)
        {
            $category = CategoryModel::find($id);
            $category->delete();
            return redirect()->route('category.index');
        }
}

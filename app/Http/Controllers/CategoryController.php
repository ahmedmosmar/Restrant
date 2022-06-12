<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\categoryRequest;
use App\Models\CategoryModel;
use App\Models\TypeModel;
use App\Traits\my_functions;

use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class CategoryController extends Controller
{
    use my_functions;

    // ======  Return  View add category   =======
    public function addCategory()
    {
        return view('pages-category.page-add-category');
    }

    // ====== store category ======
    public function storeNewCategory(categoryRequest $request)
    {
        if (isset($request)) {
            $storeCategory = $this->storeThink(CategoryModel::class, $request);
            if ($storeCategory == true) {
                return redirect()->back()->with(['success' => 'تم الادخال بنجاح']);
            }
        }
    }

    // ====== show categorys ======
    public function showCategory()
    {
        $categorys = CategoryModel::select('id', 'category_name', 'created_at')->get();
        // $categorys = CategoryModel::select('id', 'category_name', 'created_at')->paginate(5);
        $EmptyError = '';


        if ($categorys->count() > 0) {
            return view('pages-category.page-show-category', compact('categorys', 'EmptyError'));
        } else if ($categorys->count() <= 0) {
            $EmptyError = 1;
            return  view('pages-category.page-show-category', compact('categorys', 'EmptyError'));
        }
    }

    // public function searchCategory(Request $request)
    // {

    //     $request->validate(['categoryName' => 'required']);
    //     $categoryName = $request->categoryName;
    //     if ($categoryName) {
    //         $categorys =  CategoryModel::where('category_name', 'like', '%' . $categoryName . '%')->get();
    //         return view('pages-category.page-show-category', compact('categorys'));
    //     }
    // }


    // ====== return view  Edit category ======
    public function editCategory($category_id)
    {
        if (isset($category_id)) {
            $category = CategoryModel::select('id', 'category_name', 'created_at')->find($category_id);
            return view('pages-category.page-edit-category', compact('category'));
        }
    }

    // ====== function update category ======
    public function updateCategory(categoryRequest $request, $category_id)
    {
        if (isset($request) && isset($category_id)) {
            $updateCategory = $this->updateThink(CategoryModel::class, $request, $category_id);
            if ($updateCategory == true) {
                return redirect()->to('show-cat')->with(['success' => 'تم التحديث بنجاج']);
            }
        }
    }

    // ====== function ckeck befor delete ======
    public function ckeckForDelete($category_id)
    {
        if (isset($category_id)) {
            $types = TypeModel::where('category_id', $category_id)->get();
            if ($types->count() > 0)
                return response()->json(['status' => 'true']);
            else  return response()->json(['status' => 'false']);
        }
    }


    // ====== function delete category ======
    public function deleteCategory($category_id)
    {

        if (isset($category_id)) {
            // return  $category_id;

            $types = TypeModel::where('category_id', $category_id)->get();
            foreach ($types as $type) {
                $type->delete();
            }

            $deleteCategory = $this->deleteThink(CategoryModel::class, $category_id);

            if ($deleteCategory == true) {
                return response()->json([
                    'status' => true
                ]);
            }
        }
    }


    // ====== function check isset category ======
    public function getCategoryName($cat_name)
    {
        if (isset($cat_name)) {

            $catName = CategoryModel::where('category_name', $cat_name)->get();

            if (count($catName) > 0) {
                return response()->json([
                    'message'  => true,
                ]);
            }
        }
    }
}
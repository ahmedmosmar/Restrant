<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TypeRequest;
use App\Models\CategoryModel;
use App\Models\TypeModel;
use App\Traits\my_functions;

class TypeController extends Controller
{

    use  my_functions;

    //===== Return View add Type ====
    public function addType()
    {
        $categorys = CategoryModel::select('id', 'category_name')->get();
        if (isset($categorys))
            return view('pages-types.page-add-type', compact('categorys'));
    }

    //===== Function Show Types ====
    public function showType()
    {
        $types = TypeModel::select(
            'id',
            'category_id',
            'type_name',
            'price_sale',
            'price_cost',
            'time_make',
            'created_at',
        )->with(['Category_Fun_Relation' => function($select){
            $select->select('category_name', 'id');
        }])->get();

        $EmptyError = '';

        if ($types->count() > 0) {
            return view('pages-types.page-show-type', compact('types', 'EmptyError'));
        } else {
            $EmptyError = 1;
            return view('pages-types.page-show-type', compact('types', 'EmptyError'));
        }
    }



    public function searchType(Request $request)
    {
        $request->validate(['typeName' => 'required']);
        $typeName = $request->typeName;
        if ($typeName) {
            $types =  TypeModel::where('type_name', 'like', '%' . $typeName . '%')->get();
            if ($types)
                return view('pages-types.page-show-type', compact('types'));
        }
    }

    //  Function Store New Type foot
    public function storeNewType(TypeRequest $request)
    {

        if (isset($request)) {
            // store function from my_function class
            $return = $this->storeThink(TypeModel::class, $request);
            if ($return == true) return redirect()->back()->with(['success' => 'تم الادخال بنجاح']);
        }
    }

    //  Function Edit  Type foot
    public function ediType($type_id)
    {
        if (isset($type_id)) {
            $categorys = CategoryModel::select('id', 'category_name')->get();
            $type = TypeModel::find($type_id);
            if ($type)
                return view('pages-types.page-edit-type', compact('type', 'categorys'));
        }
    }

    // Function  Update Type foot
    public function updateType(TypeRequest $request, $type_id)
    {
        if (isset($request) && isset($type_id)) {
            //   Function update from my_function class
            $return = $this->updateThink(TypeModel::class, $request, $type_id);
            if ($return == true) return redirect()->to('show-type')->with(['success' => 'تم التحديث بنجاح']);
        }
    }

    //  Function Detele Type
    public function deleteType($type_id)
    {
        if (isset($type_id)) {
            //   Function delete from my_function class
            $return = $this->deleteThink(TypeModel::class, $type_id);
            if ($return == true) return response()->json([
                'status' => true
            ]);
        }
    }
}
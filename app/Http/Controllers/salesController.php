<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableModel;
use App\Models\TypeModel;
use App\Models\OrderModel;
use App\Models\CategoryModel;
use App\Models\WeaterModel;
use App\Traits\my_functions;

class salesController extends Controller
{
    public function showSales()
    {
        $tables = TableModel::select('id', 'table_name', 'created_at')->get();
        $tabel_number = 1;
        return view('pages-sales.page-sales', compact('tables', 'tabel_number'));
    }

    public function addNewTable()
    {
        $create = TableModel::create([
            'table_name' => "table",
        ]);
        if ($create) {
            return redirect()->to('sales');
        }
    }

    public function salesTable($table_id, $table_number)
    {

        $weaters    = WeaterModel::select('id', 'weater_name')->get();
        $categorys    = CategoryModel::select('id', 'category_name')->get();
        $typeModels   = TypeModel::select('id', 'type_name', 'price_sale')->get();
        $orderModels  = OrderModel::select(
            'id',
            'type_id',
            'type_amount',
            'type_price',
            'sales_table',
            'status',
            'created_at'
        )->where('status', 0)->where('sales_table', $table_number)->get();
        // return $orderModels->type_amount;
        $final_price = 0;
        foreach ($orderModels as  $order) {
            $final_price += $order->type_amount * $order->type_price;
        }

        $current = 1;
        // return view('pages-sales.page-sales-table', compact('table_number', 'typeModels', 'orderModels', 'current', 'categorys', 'final_price', 'weaters'));
        if ($categorys->count() > 0) {
            $EmptyError = '';
            return view('pages-sales.page-sales-direct', compact('EmptyError', 'weaters', 'categorys', 'typeModels', 'orderModels', 'final_price', 'current', 'table_number'));
        } else {
            $EmptyError = 1;
            return view('pages-sales.page-sales-direct', compact('EmptyError', 'weaters', 'categorys', 'typeModels', 'orderModels', 'final_price', 'current', 'table_number'));
        }
    }



    // ====== Function Get Category Item ======
    public function getCategoryItems($category_id)
    {
        if (isset($category_id)) {
            $types = TypeModel::select(
                'id',
                'category_id',
                'type_name',
                'price_sale'
            )->where('category_id', $category_id)->get();

            if ($types->count() > 0) {
                return response()->json([
                    'status'   => true,
                    'category_id' => $category_id,
                    'types' => $types
                ]);
            }
        }
    }

    public function directSales($sales_direct_id, $table_number)
    {
        // return $sales_direct_id;
        $weaters    = WeaterModel::select('id', 'weater_name')->get();
        $categorys    = CategoryModel::select('id', 'category_name')->get();
        $typeModels   = TypeModel::select('id', 'type_name', 'price_sale')->get();
        $orderModels  = OrderModel::select(
            'id',
            'type_id',
            'type_amount',
            'type_price',
            'sales_table',
            'status',
            'created_at'
        )->where('status', 0)->where('sales_table', $table_number)->get();
        // return $orderModels->type_amount;
        $final_price = 0;
        foreach ($orderModels as  $order) {
            $final_price += $order->type_amount * $order->type_price;
        }

        $current = 1;

        if ($categorys->count() > 0) {
            $EmptyError = '';
            return view('pages-sales.page-sales-direct', compact('EmptyError', 'weaters', 'categorys', 'typeModels', 'orderModels', 'final_price', 'current', 'table_number'));
        } else {
            $EmptyError = 1;
            return view('pages-sales.page-sales-direct', compact('EmptyError', 'weaters', 'categorys', 'typeModels', 'orderModels', 'final_price', 'current', 'table_number'));
        }
    }


    public function getItemAuto($tabel_number)
    {

        // return $tabel_number;

        $orders = OrderModel::select(
            'id',
            'type_id',
            'type_amount',
            'type_price',
            'sales_table',
            'status',
            'created_at'
        )->with([
            'type_Fun_Relation' => function ($type_name) {
                $type_name->select('type_name', 'id');
            }
        ])->where('status', 0)->where('sales_table', $tabel_number)->get();

        // return $orders->type_amount;
        return response()->json([
            'status' => true,
            'orders' => $orders,
        ]);
    }
    //  public function addToOrders($id){
    //       $typeModel = TypeModel::select('type_name')->find($id);
    //       $array = [];
    //        array_push($array,$typeModel);
    //        return view('pages-sales.page-sales-table' , compact('array'));

    //     //   return $array[0];

    //  }
}
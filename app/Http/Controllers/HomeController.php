<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\CategoryModel;
use App\Models\ResetModel;
use App\Models\TypeModel;
use App\Models\SupplierModel;
use App\Models\WeaterModel;
use App\Models\BuysModel;
use App\Models\TableModel;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $buys       = BuysModel::all();
        $sales      = OrderModel::all();
        $suppliers  = SupplierModel::all();
        $weaters    = WeaterModel::all();
        $types      = TypeModel::all();
        $resets       = ResetModel::all();
        $buys_price = 0;
        foreach ($buys as $buy) {
            $buys_price += $buy->final_price;
        }


        $resets_price = 0;
        foreach ($resets as $reset) {
            $resets_price += $reset->final_price;
        }
        $sales_count     = count($sales);
        $suppliers_count = count($suppliers);
        $weaters_count   = count($weaters);
        $types_count     = count($types);




        return view('home', compact('buys_price', 'sales_count', 'suppliers_count', 'weaters_count', 'types_count', 'resets_price'));
    }
}
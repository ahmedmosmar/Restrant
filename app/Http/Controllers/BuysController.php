<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuysModel;
use App\Models\SupplierModel;
use App\Http\Requests\BuysRequest;
use App\Traits\my_functions;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class BuysController extends Controller
{

    use my_functions;

    // Function Return Add Buys View
    public function addBuys()
    {
        $suppliers  = SupplierModel::select('id', 'supplier_name')->get();
        if (isset($suppliers))
            return view('pages-buys.page-buys', compact('suppliers'));
    }

    // Function Store New Buys
    public function storeNewBuys(BuysRequest $request)
    {
        if (isset($request)) {
            $create = $this->storeThink(BuysModel::class, $request);
            if ($create  == true) {
                return redirect()->back()->with(['success' => 'تم الادخال بنجاح']);
            }
        }
    }

    // Function Show Buys
    public function showBuys()
    {
        $buys = BuysModel::with([
            'supplier_Fun_Relation' => function ($supplier_name) {
                $supplier_name->select('supplier_name', 'id');
            },
        ])->get();


        if (isset($buys)) {
            if ($buys->count() > 0) {
                $EmptyError = '';
                return view('pages-buys.page-show-buys', compact('buys', 'EmptyError'));
            } else {
                $EmptyError = 1;
                return view('pages-buys.page-show-buys', compact('buys', 'EmptyError'));
            }
        }
    }

    // Function Edit Buys
    public function editBuys($buy_id)
    {
        if (isset($buy_id)) {
            $suppliers  = SupplierModel::select('id', 'supplier_name')->get();

            $buy = BuysModel::select(
                'id',
                'supplier_id',
                'component',
                'unit',
                'amount',
                'unit_price',
                'final_price',
                'description'
            )->with([
                'supplier_Fun_Relation' => function ($supplier_name) {
                    $supplier_name->select('supplier_name', 'id');
                },
            ])->find($buy_id);

            if (isset($suppliers) && isset($buy_id))
                return view('pages-buys.page-edit-buys', compact('buy', 'suppliers'));
        }
    }

    // Function Update Buys
    public function updateBuy(BuysRequest $request, $buy_id)
    {
        if (isset($request) && isset($buy_id)) {
            $update = $this->updateThink(BuysModel::class, $request, $buy_id);
            if ($update  == true) {
                return redirect()->to('show-buys')->with(['success' => 'تم التحديث بنجاح']);
            }
        }
    }

    // Function Delete Buys
    public function deleteBuy($buy_id)
    {
        if (isset($buy_id)) {
            $delete = $this->deleteThink(BuysModel::class, $buy_id);
            if ($delete  == true)
                return response()->json([
                    'status' => true
                ]);
        }
    }
}
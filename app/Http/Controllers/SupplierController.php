<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use Illuminate\Http\Request;
use App\Models\SupplierModel;
use App\Models\BuysModel;
use App\Traits\my_functions;

class SupplierController extends Controller
{
    use my_functions;

    // Function Retrun  Supplier View
    public function addSupplier()
    {
        return view('pages-suppliers.page-add-supplier');
    }

    // Function Store New Supplier
    public function storeNewSupplier(SupplierRequest $request)
    {
        if (isset($request)) {
            $create = $this->storeThink(SupplierModel::class, $request);
            if ($create == true) {
                return redirect()->to('add-supplier')->with(['success' => 'تم الادخال بنجاح ']);
            }
        }
    }

    // Function Show Suppliers
    public function showSuppliers()
    {
        $suppliers = SupplierModel::select('id', 'supplier_name', 'phone_number', 'created_at')->get();


        if ($suppliers->count() > 0) {
            $EmptyError = '';
            return view('pages-suppliers.page-show-suppliers', compact('suppliers', 'EmptyError'));
        } else {
            $EmptyError = 1;
            return view('pages-suppliers.page-show-suppliers', compact('suppliers', 'EmptyError'));
        }
    }

    // Function Edit Supplier
    public function editSupplier($supplier_id)
    {
        if (isset($supplier_id)) {
            $supplier = SupplierModel::find($supplier_id);
            if (isset($supplier)) {
                return view('pages-suppliers.page-edit-supplier', compact('supplier'));
            }
        }
    }

    // Function Update Supplier
    public function updateSupplier(SupplierRequest $request, $supplier_id)
    {
        if (isset($request) && isset($supplier_id)) {
            $update = $this->updateThink(SupplierModel::class, $request, $supplier_id);
            if ($update) {
                return redirect()->to('show-suppliers')->with(['success' => 'تم التحديث بنجاح ']);
            }
        }
    }

    // Function Ckech Delete Supplier
    public function checkDeleteSupplier($supplier_id)
    {
        if (isset($supplier_id)) {

            $buys =  BuysModel::where('supplier_id', $supplier_id);
            if ($buys->count() > 0) {
                return response()->json(['status' => true]);
            } else {
                return response()->json(['status' => false]);
            }
        }
    }

    // Function Delete Supplier
    public function deleteSupplier($supplier_id)
    {
        if (isset($supplier_id)) {
            $find_supplier = SupplierModel::find($supplier_id);
            if (isset($find_supplier)) {
                $delete = $this->deleteThink(SupplierModel::class, $supplier_id);
                if ($delete == true) {
                    return response()->json([
                        'status'  => true,
                    ]);
                }
            }
        }
    }
}
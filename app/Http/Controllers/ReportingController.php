<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TableModel;
use App\Models\TypeModel;
use App\Models\OrderModel;
use App\Models\SupplierModel;
use App\Models\BuysModel;

use Barryvdh\DomPDF\Facade\pdf;
// use Barryvdh\DomPDF\PDF;
class ReportingController extends Controller
{
    public function __construct()
    {
        $this->middleware('userLevel');
    }
    public function salesReport()
    {
        $tables = TableModel::select('id', 'table_name')->get();
        $types = TypeModel::select('id', 'type_name')->get();
        return view('pages-reporting.page-sales-reporting', compact('tables', 'types'));
    }

    public function getSalesReport(Request $request)
    {

        //   return  $request->table ;
        if ($request->type == '' && $request->table == '') {

            $report = OrderModel::where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->get();
            $type_name = 'كل الاصناف';
            $reset_id = '';

        $price = 0;
        // $salesCount = count($report);
        foreach ($report as $re) {
            $price +=  $re->type_price;
        }


        } else if ($request->type == '') {

            $report = OrderModel::where('sales_table', $request->table)
                ->where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->get();
            $type_name = 'كل الاصناف';
            $reset_id = '';
        } else if ($request->table == '') {
            $report = OrderModel::where('type_id',  $request->type)
                ->where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->get();

            $type =  OrderModel::where('type_id',  $request->type)
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->first();
            $type_name =  $type->type_Fun_Relation->type_name;
            $reset_id =  $type->reset_id;
        } else {

            $report = OrderModel::where('type_id',  $request->type)

                ->where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->where('sales_table', $request->table)
                ->get();

            $type =  OrderModel::where('type_id',  $request->type)
                ->with(['type_Fun_Relation' => function ($type_n) {
                    $type_n->select('type_name', 'id');
                }])->first();


            $type_name =  $type->type_Fun_Relation->type_name;
            $reset_id =  $type->reset_id;
        }

        $price = 0;
        $salesCount = count($report);
        foreach ($report as $re) {
            $price +=  $re->type_price;
        }

        $date_from = $request->date_from;
        $date_for  = $request->date_for;

        // if ($report->count() > 0) {
            return view(
                'pages-reporting.page-show-sales-report',
                compact('report', 'date_from', 'date_for', 'salesCount', 'type_name', 'price', 'reset_id')
            );
        // }


        // $count = 0;
        // foreach ($report as $re) {
        //     $count +=  $re->type_price;
        // }
        // return $count;
    }


    public function BuysReport()
    {
        $suppliers = SupplierModel::all();
        return view('pages-reporting.page-buys-reporting', compact('suppliers'));
    }

    public function getBuysReport(Request $request)
    {
        if ($request->supplier == '') {

            $reports = BuysModel::where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->with(['supplier_Fun_Relation' => function ($supplier) {
                    $supplier->select('supplier_name', 'id');
                }])->get();

            $price = 0;
            foreach ($reports as $report) {
                $price += $report->final_price;
            }
        } else {

            $reports = BuysModel::where('created_at', '>=', $request->date_from . ' ' . date("h:i:s"))
                ->where('created_at', '<=', $request->date_for . ' ' . date("h:i:s"))
                ->where('supplier_id', 'like', $request->supplier)
                ->with(['supplier_Fun_Relation' => function ($supplier) {
                    $supplier->select('supplier_name', 'id');
                }])->get();
            $price = 0;
            foreach ($reports as $report) {
                $price += $report->final_price;
            }
        }


        $date_from = $request->date_from;
        $date_for  = $request->date_for;
        return view(
            'pages-reporting.page-show-buys-report',
            compact('reports', 'date_from', 'date_for', 'price')
        );
        //   return $request;
    }

    public function printReport()
    {

        $data = ['title' => 'Laravel 7 Generate PDF From View Example Tutorial'];

        // $pdf = PDF::loadView('pages-category.page-add-category', $data);
        $pdf = PDF::loadView('report');


        return $pdf->download('report.pdf');
    }
}
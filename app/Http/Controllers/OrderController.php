<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\CategoryModel;
use App\Traits\my_functions;
use PhpParser\Node\Expr\Empty_;

class OrderController extends Controller
{
    use my_functions;
    public function addToOrders(Request $request)
    {

        if (isset($request)) {
            $order = OrderModel::where('sales_table', $request->sales_table)->where('type_id', $request->type_id)->where('status', 0)->get();

            if (count($order) <= 0) {
                $create = $this->storeThink(OrderModel::class, $request);
                if ($create) {

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
                    ])->where('status', 0)->where('sales_table', $request->sales_table)->get();

                    $final_price = 0;
                    foreach ($orders as  $order) {
                        $final_price += $order->type_amount * $order->type_price;
                    }
                    return response()->JSON([
                        'message' => "sccuess",
                        'status' => true,
                        'orders' => $orders,
                        'final_price' => $final_price
                    ]);
                }
            }
        }
    }




    public function rejectOrders($table_number)
    {
        if (isset($table_number)) {
            $orders = OrderModel::where('sales_table', $table_number)->where('status', 0)->get();
            foreach ($orders as  $order) {
                $order_id = $order->id;
                $this->deleteThink(OrderModel::class, $order_id);
            }
            return response()->json([
                'status' => true,
            ]);
        }
    }
    public function increaceOrders($orders_id)
    {
        if (isset($orders_id)) {

            $find_order = OrderModel::find($orders_id);
            if ($find_order) {
                $order = OrderModel::select('type_amount', 'sales_table')->find($orders_id);

                $amount_order =  $order->type_amount;

                $updated =  $find_order->update([
                    'type_amount' => $amount_order += 1
                ]);

                if ($updated) {

                    $orders = OrderModel::select(
                        'id',
                        'type_id',
                        'type_amount',
                        'type_price',
                        'sales_table',
                        'status',
                        'created_at'
                    )
                        ->where('status', 0)
                        ->where('sales_table', $order->sales_table)->with([
                            'type_Fun_Relation' => function ($type_name) {
                                $type_name->select('type_name', 'id');
                            }
                        ])->get();
                    // ->where('sales_table', $order->sales_table)->get();

                    $final_price = 0;
                    foreach ($orders as  $order) {
                        $final_price += $order->type_amount * $order->type_price;
                    }
                    return response()->json([
                        'status' => true,
                        'orders' => $orders,
                        'order_id' => $orders_id,
                        'final_price' => $final_price
                    ]);
                }
            }
        }
    }

    public function dicreaceOrders($order_id)
    {
        if (isset($order_id)) {
            $find_order = OrderModel::find($order_id);
            if ($find_order) {
                $order = OrderModel::select('type_amount', 'sales_table')->find($order_id);

                $amount_order =  $order->type_amount;
                if ($amount_order > 1) {

                    $updated =  $find_order->update([
                        'type_amount' => $amount_order -= 1
                    ]);

                    if ($updated) {
                        $orders = OrderModel::select(
                            'id',
                            'type_id',
                            'type_amount',
                            'type_price',
                            'sales_table',
                            'status',
                            'created_at'
                        )
                            ->where('status', 0)
                            ->where('sales_table', $order->sales_table)->with([
                                'type_Fun_Relation' => function ($type_name) {
                                    $type_name->select('type_name', 'id');
                                }
                            ])->get();

                        $final_price = 0;
                        foreach ($orders as  $order) {
                            $final_price += $order->type_amount * $order->type_price;
                        }

                        return response()->json([
                            'status' => true,
                            'orders' => $orders,
                            'order_id' => $order_id,
                            'final_price' => $final_price

                        ]);
                    }
                }
            }
        }
    }


    public function deleteOrder($order_id)
    {
        if (isset($order_id)) {
            $table_number =  OrderModel::find($order_id);
            $delete_order = $this->deleteThink(OrderModel::class, $order_id);

            if ($delete_order == true) {
                $orders = OrderModel::where('status', 0)
                    ->where('sales_table', $table_number->sales_table)->with([
                        'type_Fun_Relation' => function ($type_name) {
                            $type_name->select('type_name', 'id');
                        }
                    ])->get();

                $final_price = 0;
                foreach ($orders as  $order) {
                    $final_price += $order->type_amount * $order->type_price;
                }

                return response()->json([
                    "status" => true,
                    'final_price' => $final_price,
                ]);
            }
        }
    }
}
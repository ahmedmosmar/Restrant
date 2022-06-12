<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResetModel;
use App\Models\OrderModel;
use App\Traits\my_functions;

class ResetContoller extends Controller
{
    use my_functions;
    public function addReset(Request $request)
    {

        if (isset($request)) {

            $add_reset = $this->storeThink(ResetModel::class, $request);
            if ($add_reset) {

                $reset_id = ResetModel::orderby('id', 'DESC')->first();
                $orders = OrderModel::where('sales_table', $request->table_number)->where('status', 0)->get();

                foreach ($orders as $order) {
                    $update_order = OrderModel::find($order->id);
                    $update_order->update([
                        'status' => 1,
                        'reset_id' => $reset_id->id

                    ]);
                }

                return response()->json([
                    'status' => true,

                ]);
            }
        }
    }
}
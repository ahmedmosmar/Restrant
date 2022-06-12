<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeatersRequest;
use App\Models\WeaterModel;
use App\Traits\my_functions;

class WeaterController extends Controller
{
    use  my_functions;

    //  Function  Return view add Waiter
    public function addWeater()
    {
        return view('pages-weaters.page-add-weater');
    }

    //  Function  Show Waiter
    public function showWeater()
    {
        $weaters = WeaterModel::select('id', 'weater_name', 'created_at')->get();

        if ($weaters->count() > 0) {
            $EmptyError = '';
            return view('pages-weaters.page-show-weaters', compact('weaters', 'EmptyError'));
        } else {
            $EmptyError = 1;
            return view('pages-weaters.page-show-weaters', compact('weaters', 'EmptyError'));
        }
    }

    public function searchWeater(Request $request)
    {
        if (isset($request)) {
            $request->validate(['weaterName' => 'required']);
            $weaterName = $request->weaterName;
            if ($weaterName) {
                $weaters =  WeaterModel::where('weater_name', 'like', '%' . $weaterName . '%')->get();
                return view('pages-weaters.page-show-weaters', compact('weaters'));
            }
        }
    }


    //  Function Store new Waiter
    public function storeNewWeater(WeatersRequest $request)
    {
        if (isset($request)) {
            // store function from my_function class
            $return = $this->storeThink(WeaterModel::class, $request);
            if ($return == true) return redirect()->back()->with(['success' => 'تم الادخال بنجاح']);
        }
    }

    //  Function Edit Waiter
    public function editWeater($weater_id)
    {
        if (isset($weater_id)) {
            $weater = WeaterModel::select('id', 'weater_name', 'created_at')->find($weater_id);
            if ($weater)
                return view('pages-weaters.page-edit-weater', compact('weater'));
        }
    }

    //  Function Update Waiter
    public function updateWeater(WeatersRequest $request, $weater_id)
    {
        if (isset($request) && isset($weater_id)) {
            // update  function from my_function class
            $return = $this->updateThink(WeaterModel::class, $request, $weater_id);
            if ($return == true) return redirect()->to('show-weater')->with(['success' => 'تم التحديث بنجاح']);
        }
    }

    //  Function delete Waiter
    public function deleteWeater($weater_id)
    {
        if (isset($weater_id)) {
            // delete  function from my_function class
            $return = $this->deleteThink(WeaterModel::class, $weater_id);
            if ($return == true) return response()->json([
                'status' => true
            ]);
        }
    }
}
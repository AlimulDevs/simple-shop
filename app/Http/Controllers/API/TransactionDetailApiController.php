<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailApiController extends Controller
{
    public function getByCustomer()
    {
        $data_customer = Customer::where("user_id", auth()->user()->id)->first();
        $data = TransactionDetail::where("customer_id", $data_customer->id)->with(["product", "customer.user"])->get();
        return response()->json([
            'isSuccess' => true,
            "message" => "Success Get Data By Customer",
            "data" => $data
        ]);
    }
    public function getAll()
    {

        $data = TransactionDetail::with(["product", "customer.user"])->get();
        return response()->json([
            'isSuccess' => true,
            "message" => "Success Get All Data",
            "data" => $data
        ]);
    }
    public function changeStatus($id, Request $request)
    {

        $data = TransactionDetail::where("id", $id)->update([
            "status" => $request->status,
        ]);
        return response()->json([
            'isSuccess' => true,
            "message" => "Success Change Status",

        ]);
    }
}

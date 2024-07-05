<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function create(Request $request)
    {
        $data_customer = Customer::where("user_id", auth()->user()->id)->first();
        $data_product = Product::where("id", $request->product_id)->first();
        $cart = Cart::create([
            'product_id' => $request->product_id,
            'customer_id' => $data_customer->id,
            'total_qty' => $request->total_qty,
            'size' => $request->size,
            'varian' => $request->varian,
            'total_price' => $request->total_qty * $data_product->price,

        ]);



        return response()->json(["message" => "Success Create Data", "data" => $cart]);
    }
    public function update($id, Request $request)
    {
        $cart = Cart::where("id", $id)->first();
        $data_product = Product::where("id", $cart->product_id)->first();
        $cart->update([
            'total_qty' => $request->total_qty,
            'size' => $request->size,
            'varian' => $request->varian,
            'total_price' => $request->total_qty * $data_product->price,
        ]);



        return response()->json(["message" => "Success Update Data", "data" => $cart]);
    }
    public function getAll()
    {
        $data_customer = Customer::where("user_id", auth()->user()->id)->first();
        $cart = Cart::where("customer_id", $data_customer->id)->with("product")->get();



        return response()->json(["message" => "Success Get All Data", "data" => $cart]);
    }
    public function getById($id)
    {
        $cart = Cart::where("id", $id)->first();
        return response()->json(["message" => "Success Get Data By ID", "data" => $cart]);
    }
    public function delete($id)
    {
        $cart = Cart::where("id", $id)->delete();



        return response()->json(["message" => "Success Delete Data"]);
    }
    public function checkout(Request $request)
    {
        $data_customer = Customer::where("user_id", auth()->user()->id)->first();
        foreach ($request->cart_id as $cart_id) {
            $data_cart = Cart::where("id", $cart_id)->first();

            TransactionDetail::create([
                'product_id' => $data_cart->product_id,
                'customer_id' => $data_customer->id,
                'total_price' => $data_cart->total_price,
                'total_qty' => $data_cart->total_qty,
                'size' => $data_cart->size,
                'varian' => $data_cart->varian,
                'status' => "processing",
                'payment_method' => $request->payment_method,
                'delivery' => $request->delivery,
                'tax' => $request->tax,
            ]);
            Product::where("id", $data_cart->product_id)->update([
                'stock' =>  $data_cart->product->stock - $data_cart->total_qty,
                'sold' => $data_cart->product->sold + $data_cart->total_qty
            ]);
            $data_cart->delete();
        }



        return response()->json(["message" => "Success Checkout"]);
    }
}

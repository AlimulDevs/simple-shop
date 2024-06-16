<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller
{
    public function create(Request $request)
    {
        $product_category = ProductCategory::create([

            'name' => $request->name,

        ]);



        return response()->json(["message" => "Success Create Data", "data" => $product_category]);
    }
    public function update($id, Request $request)
    {
        $product_category = ProductCategory::where("id", $id)->update([

            'name' => $request->name,

        ]);



        return response()->json(["message" => "Success Update Data", "data" => $product_category]);
    }
    public function getAll()
    {
        $product_category = ProductCategory::with("product")->get();



        return response()->json(["message" => "Success Get All Data", "data" => $product_category]);
    }
    public function getById($id)
    {
        $product_category = ProductCategory::where("id", $id)->with("product")->first();
        return response()->json(["message" => "Success Get Data By ID", "data" => $product_category]);
    }
    public function delete($id)
    {
        $product_category = ProductCategory::where("id", $id)->delete();



        return response()->json(["message" => "Success Delete Data"]);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Helpers\DeleteFile;
use App\Helpers\UploadFile;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function create(Request $request)
    {

        $image_url = UploadFile::upload("foto_product", $request->file("image_url"));
        $product = Product::create([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'sold' => 0,
            'varian' => $request->varian,
            'size' => $request->size,
            'description' => $request->description,
            'image_url' => $image_url,
        ]);



        return response()->json(["message" => "Success Create Data", "data" => $product]);
    }
    public function update($id, Request $request)
    {


        $product = Product::where("id", $id)->update([
            'product_category_id' => $request->product_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'sold' => 0,
            'varian' => $request->varian,
            'size' => $request->size,
            'description' => $request->description,


        ]);

        if ($request->file("image_url") != null) {
            $product = Product::where("id", $id)->first();
            DeleteFile::delete($product->image_url);
            $image_url = UploadFile::upload("foto_product", $request->file("image_url"));
            $product->update([
                'image_url' => $image_url,



            ]);
        }



        return response()->json(["message" => "Success Update Data", "data" => $product]);
    }
    public function getAll()
    {
        $product = Product::get();



        return response()->json(["message" => "Success Get All Data", "data" => $product]);
    }
    public function getById($id)
    {
        $product = Product::where("id", $id)->first();
        return response()->json(["message" => "Success Get Data By ID", "data" => $product]);
    }
    public function delete($id)
    {
        $product = Product::where("id", $id)->first();
        DeleteFile::delete($product->image_url);


        $product->delete();



        return response()->json(["message" => "Success Delete Data"]);
    }
}

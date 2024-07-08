<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryWebController extends Controller
{
    public function create(Request $request)
    {

        $product_category = ProductCategory::create([
            "name" => $request->name,
        ]);
        return redirect('/product-category/index');
    }

    public function update(Request $request)
    {

        $product_category = ProductCategory::where("id", $request->id)->update([
            "name" => $request->name,
        ]);
        return redirect('/product-category/index');
    }

    public function delete($id)
    {
        $product_category = ProductCategory::find($id);
        $product_category->delete();
        return redirect('/product-category/index');
    }
}

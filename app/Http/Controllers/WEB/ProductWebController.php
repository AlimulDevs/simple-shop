<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function delete($id)
    {

        $data_product = Product::find($id);
        $data_product->delete();
        return redirect('/product/index');
    }
}

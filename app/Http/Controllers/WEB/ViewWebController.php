<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function berandaView()
    {
        return view('beranda.index');
    }
    public function customerView()
    {
        $data_customer = Customer::with('user')->get();
        return view('customer.index', compact('data_customer'));
    }
    public function customerCreateView()
    {

        return view('customer.create',);
    }
    public function productView()
    {
        $data_product = Product::get();
        return view('product.index', compact('data_product'));
    }
    public function productCategoryView()
    {
        $data_product_category = ProductCategory::get();
        return view('product-category.index', compact('data_product_category'));
    }
    public function productCategoryCreateView()
    {

        return view('product-category.create');
    }
}

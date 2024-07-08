<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingApiController extends Controller
{
    public function create(Request $request)
    {
        $data_customer = Customer::where("user_id", auth()->user()->id)->first();
        $rating = Rating::create([
            'product_id' => $request->product_id,
            'customer_id' => $data_customer->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        $banyak_rating = Rating::where("product_id", $request->product_id)->count();
        $sum_rating = Rating::where("product_id", $request->product_id)->sum('rating');


        $rating = $sum_rating / $banyak_rating;
        $data_product = Product::where("id", $request->product_id)->first();
        $data_product->update([
            'total_rating' => $rating
        ]);
        return response()->json(["message" => "Success Create Data", "data" => $rating]);
    }

    public function delete($id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return response()->json(["message" => "Success Delete Data", "data" => $rating]);
    }
}

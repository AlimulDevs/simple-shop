<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'customer_id',
        'total_qty',
        'size',
        'varian',
        'total_price',


    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}

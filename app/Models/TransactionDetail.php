<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{

    protected $fillable = [
        'product_id',
        'customer_id',
        'total_price',
        'status',
        'payment_method',
        'delivery',
        'tax',
        'total_qty',
        'varian',
        'size',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    use HasFactory;
}

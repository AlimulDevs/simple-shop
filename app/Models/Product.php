<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'product_category_id',
        'name',
        'price',
        'stock',
        'sold',
        'varian',
        'size',
        'description',
        'image_url',


    ];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    use HasFactory;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_more_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'size',
        'type',
        'price',
        'sale',
        'count',
        'category_id',
        'images'
    ];
}

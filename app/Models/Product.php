<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'status',
        'id_vendor',
        'made',
        'material',
        'location',
        'description',
        'slug'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;protected $fillable = [
    'id',
    'product_id',
    'user_id',
    'vote',
    'comment',
    'status'
];
}

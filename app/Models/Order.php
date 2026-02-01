<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'subtotal',
        'tax',
        'total',
        'status',
        'delivered_on',
        'items_count',
    ];
}  
 
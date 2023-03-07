<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marketshopping extends Model
{
    use HasFactory;
    protected $fillable = [
        'shoppingday',
        'buyer',
        'budget',
        'invoice_amount',
        'product',
        'unit',
        'quantity'
    ];
}

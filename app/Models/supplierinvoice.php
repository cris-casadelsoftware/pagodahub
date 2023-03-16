<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplierinvoice extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'invoice_day',
        'name_supplier',
        'invoice_number',
        'product',
        'unit',
        'quantity',
        'invoice_quantity',
        'difference',
        'price',
        'payment_type',
        'total_quantity',
        'total_invoice_quantity',
        'total_price',
        'total_credit',
        'total_cash',
        'file_image'
    ];
}

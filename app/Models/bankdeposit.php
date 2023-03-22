<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankdeposit extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'dates',
        'banks',
        'cash',
        'file_img',
    ];
}

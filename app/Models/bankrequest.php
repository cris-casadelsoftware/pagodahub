<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankrequest extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'fromdate',
        'todate',
        'weeknumber',
        'cash1',
        'cash5',
        'roll0_01',
        'roll0_05',
        'roll0_10',
        'roll0_25',
        'roll0_50',
        'roll1_00',
        'file_img',
    ];
}

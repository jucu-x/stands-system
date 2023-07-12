<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'partial_time',
        'expected_cost',
        'building',
        'x',
        'y',
        'width',
        'length',
        'expo_id'
    ];
}

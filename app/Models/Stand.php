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

    /**
     * Finds the last created stand's code for any specific expo
     * @param int $expo_id expo->id
     * @return int last stand's code (0 if none)
     */
    static public function lastCodeInExpo($expo_id): int
    {
        return intval(self::where('expo_id', $expo_id)->orderBy('code', 'desc')->first()?->code);
    }
}

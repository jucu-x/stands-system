<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StandRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_message',
        'stand_start_date',
        'stand_end_date',
        'attended',
        'stand_id'
    ];

    /**
     * Get the anonymous request associated with this request if exists one.
     */
    public function anonymous_stand_request(): HasOne
    {
        return $this->hasOne(AnonymousStandRequest::class, 'id');
    }
}

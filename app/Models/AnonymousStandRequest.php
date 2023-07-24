<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AnonymousStandRequest extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'phone_number'
    ];

    /**
     * Get the request associated with this anonymous request.
     */
    public function base_stand_request(): BelongsTo
    {
        return $this->belongsTo(StandRequest::class, 'id');
    }
}

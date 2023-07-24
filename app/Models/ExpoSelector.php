<?php

namespace App\Models;

use App\Enums\ExpoSelectorCriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExpoSelector extends Model
{
    use HasFactory;

    protected $fillable = [
        'criterion',
        'expo_id'
    ];
    public function expo(): BelongsTo
    {
        return $this->belongsTo(Expo::class);
    }

    static public function current() : ExpoSelector|null {
        return self::where('criterion', ExpoSelectorCriteria::Current->value)->first();
    }
}

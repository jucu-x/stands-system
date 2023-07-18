<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expo extends Model
{
    use HasFactory;
    protected $fillable = [
        "version",
        "name",
        "start_date",
        "end_date",
        "description",
        "organizer",
        "logo"
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    /**
     * Get the stands created for this expo.
     */
    public function stands(): HasMany
    {
        return $this->hasMany(Stand::class);
    }
    
    public function summary(): string{
        return $this->name . " - " . $this->version . " - " . $this->start_date->format("Y");
    }
}

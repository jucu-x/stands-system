<?php

namespace App\Models;

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
}

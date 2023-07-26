<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'expo_id',
        'available'
    ];

    static public $verbose_fields = [
        'code' => 'Código',
        'partial_time' => 'De tiempo parcial',
        'expected_cost' => 'Costo sugerido',
        'building' => 'Edificio o sección',
        'x' => 'x',
        'y' => 'y',
        'width' => 'Ancho del stand',
        'length' => 'Largo del stand',
        'expo_id' => 'Id del evento',
        'available' => 'Disponible',
        'created_by' => 'Creado por',
        'updated_by' => 'Última vez modificado por',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de última modificación',
        // Custom fields
        'expo' => 'Evento',

    ];
    public function expo(): BelongsTo
    {
        return $this->belongsTo(Expo::class);
    }
    public function requests() : HasMany {
        return $this->hasMany(StandRequest::class);
    }

    static public function fieldsToVerbose(array $fields_array): array{
        $verbose_fields_array = [];
        foreach ($fields_array as $field) {
            array_push($verbose_fields_array, self::$verbose_fields[$field]);
        }
        return $verbose_fields_array;
    }

    protected $casts = [
        'available' => 'boolean',
    ];
}

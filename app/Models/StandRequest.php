<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    static public $verbose_fields = [
        'request_message' => 'Mensaje de solicitud',
        'stand_start_date' => 'Desde',
        'stand_end_date' => 'Hasta',
        'attended' => 'Solicitud revisada',
        'stand_id' => 'ID del stand solicitado',
        'stand' => 'Stand solicitado',
        // children attributes
        'name' => 'Institución solicitante',
        'email' => 'Correo de contacto',
        'phone_number' => 'Número de contacto del solicitante',
        'address' => 'Dirección del solicitante',
        // general attributes
        'created_by' => 'Creado por',
        'updated_by' => 'Última vez modificado por',
        'created_at' => 'Fecha de creación',
        'updated_at' => 'Fecha de última modificación',
    ];

    // ------------------------- RELATIONSHIPS -------------------------

    /**
     * Get the stand of this request.
     */
    public function stand(): BelongsTo
    {
        return $this->belongsTo(Stand::class);
    }
    /**
     * Get the anonymous request associated with this request if one exists.
     */
    public function anonymous_stand_request(): HasOne
    {
        return $this->hasOne(AnonymousStandRequest::class, 'id');
    }
    /**
     * Get the institution request associated with this request if one exists.
     */
    public function institution_stand_request(): HasOne
    {
        return $this->hasOne(InstitutionStandRequest::class, 'id'); // TODO: change the foreign key on this table
    }

    // ------------------------- ACCESORS -------------------------

    /**
     * Easily access children's name
     */
    public function getNameAttribute(){
        if ($this->anonymous_stand_request != null) {
            return $this->anonymous_stand_request->name;
        }
        if ($this->institution_stand_request != null) {
            return $this->institution_stand_request->institution->name;
        }
        return "SIN NOMBRE";
    }
    /**
     * Easily access children's email
     */
    public function getEmailAttribute(){
        if ($this->anonymous_stand_request != null) {
            return $this->anonymous_stand_request->email;
        }
        if ($this->institution_stand_request != null) {
            return $this->institution_stand_request->institution->email;
        }
        return "SIN CORREO";
    }
    /**
     * Easily access children's phone_number
     */
    public function getPhoneNumberAttribute(){
        if ($this->anonymous_stand_request != null) {
            return $this->anonymous_stand_request->phone_number;
        }
        if ($this->institution_stand_request != null) {
            return $this->institution_stand_request->institution->phone_number;
        }
        return "SIN Teléfono";
    }
    /**
     * Easily access children's address
     */
    public function getAddressAttribute(){
        if ($this->anonymous_stand_request != null) {
            return $this->anonymous_stand_request->address;
        }
        if ($this->institution_stand_request != null) {
            return $this->institution_stand_request->institution->address;
        }
        return null;
    }

    static public function fieldsToVerbose(array $fields_array): array{
        $verbose_fields_array = [];
        foreach ($fields_array as $field) {
            array_push($verbose_fields_array, self::$verbose_fields[$field]);
        }
        return $verbose_fields_array;
    }
}

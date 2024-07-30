<?php

// app/Models/Asistencia.php
// app/Models/Asistencia.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';
    public $timestamps = true;

    protected $fillable = [
        'persona_id',
        'tipo_persona',
        'hora_llegada',
        'hora_salida',
    ];

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'persona_id', 'id');
    }
}

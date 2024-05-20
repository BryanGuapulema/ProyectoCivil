<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'tipo_de_obra',
        'nombre_de_obra',
        'latitud',
        'longitud',
        'nombre_estudiante',
        'fecha',
    ];
}

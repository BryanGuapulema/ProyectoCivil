<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Obra extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'tipo_de_obra',
        'nombre_de_obra',
        'latitud',
        'longitud',
        'id_estudiante',
        'fecha',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function rubros_m2()
    {
        return $this->hasMany(RubroM2::class);
    }
}

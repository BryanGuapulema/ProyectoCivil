<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ancho',
        'longitud',
        'cantidad',
        'area',
        'tiempo',
        'total_personas',
        'rendimiento',
        'productividad',
        'evidencia'
    ];

    public function obreros()
    {
        return $this->belongsToMany(Obrero::class, 'obrero_rubro');
    }
}

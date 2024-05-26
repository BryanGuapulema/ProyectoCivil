<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroM2 extends Model
{
    protected $table = 'rubros_m2';

    protected $fillable = [
        'obra_id',
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

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}

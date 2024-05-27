<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroM3 extends Model
{
    protected $table = 'rubros_m3';

    protected $fillable = [
        'obra_id',
        'nombre',
        'b',
        'h',
        'l',
        'cantidad',
        'volumen',
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

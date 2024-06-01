<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroKG extends Model

{
    protected $table = 'rubros_kg';
    use HasFactory;

    protected $fillable = [
        'obra_id',
        'nombre',
        'denominacion',                
        'longitud',
        'cantidad',
        'kgm',
        'peso',        
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

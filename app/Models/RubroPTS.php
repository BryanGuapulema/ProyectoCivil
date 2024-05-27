<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RubroPTS extends Model
{
    use HasFactory;

    protected $table = 'rubros_pts';

    protected $fillable = [
        'obra_id',
        'nombre',
        'diametro',        
        'cantidad',        
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

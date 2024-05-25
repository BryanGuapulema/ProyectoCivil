<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obrero extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria',
        'cantidad'
    ];

    public function rubros()
    {
        return $this->belongsToMany(Rubro::class, 'obrero_rubro');
    }
}

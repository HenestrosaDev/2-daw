<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    
    // permite introducir registro con el método create() del modelo
    protected $fillable = [
        'nombre_articulo',
        'precio',
        'pais_origen',
        'observaciones',
        'seccion'
    ];
}

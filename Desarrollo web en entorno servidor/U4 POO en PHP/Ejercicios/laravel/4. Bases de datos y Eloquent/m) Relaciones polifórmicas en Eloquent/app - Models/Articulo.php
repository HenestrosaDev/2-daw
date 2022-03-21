<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function calificaciones() {
        return $this->morphMany('App\Models\Calificacion', 'calificacion');
    }
}
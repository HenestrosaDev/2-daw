<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function articulo() {
        return $this->hasOne('App\Models\Articulo');
    }

    public function articulos()
    {
        return $this->hasMany('App\Models\Articulo');
    }
}
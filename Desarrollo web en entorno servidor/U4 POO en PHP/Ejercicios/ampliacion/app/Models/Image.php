<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function film()
    {
        return $this->hasOne(Film::class);
    }
}

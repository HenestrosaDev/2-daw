<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fabricante extends Model
{
	use HasFactory;

	protected $primaryKey = 'codigo';

	protected $fillable = ['nombre'];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'codigo_fabricante', 'codigo');
	}
}


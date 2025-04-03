<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	use HasFactory;

	protected $primaryKey = 'codigo';

	protected $fillable = [
		'codigo_fabricante', 
		'nombre', 
		'precio'
	];

	public function fabricante()
	{
		return $this->belongsTo(Fabricante::class, 'codigo_fabricante', 'codigo');
	}
}
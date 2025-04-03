# j) Relación 1-1 inversa en Eloquent
## ¿Qué tipo de relación es?
Es el mismo concepto visto en el apartado anteriormente (**i**) pero aplicado al modelo `Phone` ya que, previamente, hemos establecido una relación unidireccional de `User` a `Phone`.

## ¿Cómo se establece en Laravel?
En la clase `Phone`, tendremos que añadir la función 
```
public function user() {
	return $this->belongsTo(User::class);
}
```

Análogamente, para obtener información del usuario al que pertenece un número de teléfono, usaremos `Phone::find($id)->user;`.
# k) Relación 1-∞ en Eloquent
## ¿Qué tipo de relación es?
Es un tipo de cardinalidad que relaciona una tabla con otra en calidad de relación 1-∞. Por ejemplo, la relación establecida entre los modelos `Post` y `Comentarios` es de 1-∞ ya que un post puede recibir muchos comentarios, y no al contrario.

## ¿Cómo se establece en Laravel?
Siguiendo el ejemplo de arriba, en la clase `Post` debemos añadir una función llamada `comentarios`, tal que así:
```
public function comentarios() {
	return $this->hasMany(Comentario::class);
}
```
Si queremos encontrar los comentarios relacionados con un post específicos, tendremos que añadir `$comentarios = Post::find(1)->comentarios;` a nuestro código.
# i) Relación 1-1 en Eloquent
## ¿Qué tipo de relación es?
Es un tipo de cardinalidad que relaciona una tabla con otra en calidad de relación 1-1. Por ejemplo, la relación establecida entre los modelos `User` y `Phone` es de 1-1 ya que a un país le pertenece una capital, y viceversa.

## ¿Cómo se establece en Laravel?
Si queremos establecer la relación de `User` a `Phone`, tendremos que añadir la siguiente función dentro de la clase `User`:
```
public function phone() {
	return $this->hasOne(Phone::class);
}
```

Para obtener el número de teléfono asociado a un usuario, bastaría con esta línea: `$phone = User::find(1)->phone;`

---

## Comandos
- `php artisan make:model Cliente --migration` para crear el modelo junto a su archivo migration correspondiente
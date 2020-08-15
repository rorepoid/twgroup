### Desafío 2: Laravel cuenta con un ORM llamado Eloquent, este ORM nos permite simplificar las consultas a la base de datos, imagina los siguientes modelos con los siguientes atributos.

- Publication (id, title, content, user_id)
- Comment (id, publication_id, content, status)

Imagina que existe la relación "Una publicación puede tener 0 o más comentarios", ¿Cómo definirías las funciones de relación en ambos modelos?
```
class Publication extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

class Comment extends Model
{
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
```

### Desafío 3: Imaginando los modelos anteriormente mencionados, crea una Query en Eloquent (Obligatorio) que obtenga: Todas las publicaciones que contengan comentarios con la palabra "Hola" en su contenido, y que además posean status "APROBADO".
```
// Arrange
        $word = 'Hola';
        $status = 'APROBADO';

// Act
$results = Publication::whereHas('comments', function (Builder $query) use ($word, $status) {
    $query->where('content', 'like', "%${word}%")
        ->whereStatus("${status}");
})->get();
```

### Desafío 4: ¿Cuáles son las ventajas que nos entrega el uso de migraciones en una aplicación Laravel funcionando en un servidor de producción?

Las ventajas de las migraciones es que podemos establecer la estructura de la base de datos de una manera sencilla; y si se planea cambiar a otro gestor de bases de datos, laravel ofrece soporte en algunas bastante utilizadas y ya no tendríamos que preocuparnos por el cambio de sintaxis.

Pero creo que lo más importante cuando funcione en producción es que podemos crear nuevas migraciones para agregar y eliminar atributos y tablas sin destruir todos los datos registrados y además, como las migraciones quedan registradas podemos versionarlas sincronizándolas con estado del código fuente que es muy útil en caso de hacer un rollback. 💾⏲️

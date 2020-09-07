### Desafío 1: Al momento de iniciar un nuevo proyecto en Laravel debemos realizar una serie de pasos para configurar el proyecto dependiendo de sus requerimientos. Imagina que necesitamos una plataforma sobre Laravel que utilizará un motor de base de datos MySQL/MariaDB, un servidor de correos SMTP y un servidor Redis. ¿Cuáles son los pasos que consideras necesarios para dejar la aplicación funcionando en modo de desarrollo? (Describe los comandos necesarios que ejecutarías y que archivos modificarías en base a los requerimientos mencionados).

### SMTP

Debemos tener una cuenta de algún servicio de smtp del cual laravel tenga soporte, de allí podemos obtener las credenciales y colocarlas en el archivo `.env`. Ejemplo:

```jsx
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=bb99a9aa4f9999
MAIL_PASSWORD=54s654s654s654
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

### redis

Laravel cuenta con soporte a redis para utilizarlo como caché, base o base de datos, también podemos usarlo para almacenar las sesiones que por defecto se guardan en `file` , lo único que necesitamos hacer es asegurarnos de tener `phpredis` o `predis` instalado y luego proceder a definir su uso en el archivo de entorno `.env` con las credenciales adecuadas.

```jsx
SESSION_DRIVER=redis
REDIS_CLIENT=predis

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=clave_ultra_secreta
REDIS_PORT=6379
```

### Mysql/MariaDB

Para configurar la base de datos con laravel, primero se necesita tener el servicio de mysql o mariadb activado, obtener el host y el puerto, luego crear la base de datos que se utilizará, una vez creada la base de datos, nos dirigimos al archivo .env para colocar las credenciales de la base de datos.

```jsx
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cool_database
DB_USERNAME=root
DB_PASSWORD=secret
```

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

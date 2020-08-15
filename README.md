### ¿Cuáles son las ventajas que nos entrega el uso de migraciones en una aplicación Laravel funcionando en un servidor de producción?

Las ventajas de las migraciones es que podemos establecer la estructura de la base de datos de una manera sencilla; y si se planea cambiar a otro gestor de bases de datos, laravel ofrece soporte en algunas bastante utilizadas y ya no tendríamos que preocuparnos por el cambio de sintaxis.

Pero creo que lo más importante cuando funcione en producción es que podemos crear nuevas migraciones para agregar y eliminar atributos y tablas sin destruir todos los datos registrados y además, como las migraciones quedan registradas podemos versionarlas sincronizándolas con estado del código fuente que es muy útil en caso de hacer un rollback. 💾⏲️

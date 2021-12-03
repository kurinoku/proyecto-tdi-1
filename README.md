# Proyecto de Taller de Ingeniería de Software I

## Configurar base de datos

### Acceso

Para configurar acceso a la base de datos, crear o modificar el archivo `DB.ini` en la misma carpeta que `index.php`
```ini
[config]
name=<nombre de bd>
host=<host>
user=<usuario>
password=<contraseña>
```
reemplazando lo que está entre los signos de "menor que", "mayor que" con el valor correspondientes, si se necesita **colocar una string vacía** como por ejemplo para la contraseña se puede usar dos comillas.
```ini
password=""
```

### Backup
En la carpeta [db](db/) está el backup que tiene la definición de las tablas ([tdi_municipalidad_feedback.sql](db/tdi_municipalidad_feedback.sql)) y otro para popular la base de datos en la subcarpeta [sql](db/sql/) ([todos.sql](db/sql/todos.sql)), de la cual también se pueden leer las credenciales.

## Iniciar Sesión
Para iniciar sesión simplemente vea un rut en [todos.sql](db/sql/todos.sql) (el primer valor en la inserción es el rut) y la contraseña siempre será `aA12345678`.


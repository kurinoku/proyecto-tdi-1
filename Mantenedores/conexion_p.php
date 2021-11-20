<?php
    $PHP_DB_NOMBRE_PATH = __DIR__."/../.DB_NOMBRE";
    $PHP_DB_NOMBRE = file_get_contents($PHP_DB_NOMBRE_PATH);

    /*
        En carpeta donde se encuentra index.php, crear un archivo llamado .DB_NOMBRE
        el cual su contenido tiene que ser el nombre de la base de datos
    */

    if (!$PHP_DB_NOMBRE) {
        die("No se pudo encontrar el nombre de la base de datos");
    }
    $PHP_DB_NOMBRE = trim($PHP_DB_NOMBRE);

    $conexion = mysqli_connect("localhost", "root", "", $PHP_DB_NOMBRE);
    if($conexion->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }

?>
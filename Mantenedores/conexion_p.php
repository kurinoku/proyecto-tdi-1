<?php
    $PHP_DB_INI_PATH = __DIR__."/../DB.ini";
    $PHP_DB_CFG = parse_ini_file($PHP_DB_INI_PATH);

    /*
        En carpeta donde se encuentra index.php, crear un archivo llamado .DB_NOMBRE
        el cual su contenido tiene que ser el nombre de la base de datos
    */

    if (!$PHP_DB_CFG) {
        die("No se cargar la configuracion de la base de datos");
    }

    $conexion = mysqli_connect(
        $PHP_DB_CFG['host'],
        $PHP_DB_CFG['user'], 
        $PHP_DB_CFG['password'], 
        $PHP_DB_CFG['name']
    );
    if($conexion->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }

?>
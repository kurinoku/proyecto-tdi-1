<?php

    $conexion = mysqli_connect("localhost", "root", "", "municipalidad");
    if($conexion->connect_error){
        die("Conexion fallida: ".$conn->connect_error);
    }

?>
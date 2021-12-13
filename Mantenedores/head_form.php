<?php
require_once "_init.php";

header('Content-type: text/html; charset=UTF-8');
require('conexion_p.php');


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de <?php echo $NOMBRE; ?></title>
    <!-- Links -->
    <?php
    bootstrapHead();
    ?>
    <!-- Diseños -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
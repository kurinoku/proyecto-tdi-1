<?php
require_once "_init.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Ver noticia</title>
    <?php
    bootstrapHead();
    ?>
</head>

<body>
    <div class="container-fluid">
        <!-- Barra de navegación primaria-->
        <?php require __DIR__ . "/../navbar_index_1.php" ?>
        <!-- Barra de navegación secundaria -->
        <?php require __DIR__ . "/../navbar_index_2.php" ?>

        <?php
        require('conexion_p.php');
        $id = $_GET['seleccionado'];
        $consulta = "SELECT * FROM noticia WHERE Id_noticia='$id'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $nombre = $row['Nombre_noticia'];
        $cuerpo = $row['Cuerpo_noticia'];
        $foto1 = $row['Ruta_portada'];
        $foto2 = $row['Ruta_foto'];
        $fecha = $row['Fecha'];
        ?>
        <div class="container w-50">
            <div class="row mt-5 mb-5">
                    <h1 class="text-center "><?php echo $nombre ?></h1>
                    <h6 class="text-center"><?php echo $fecha ?></h6>
            </div>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid pt-1 w-100" src=<?php echoRutaComillas($foto1) ?> alt="">
                </div>
                <div class="col-lg-6 text-center">
                    <img class="img-fluid pt-1 w-100" style="float:right;" src=<?php echoRutaComillas($foto2) ?> alt="">
                </div>
                <h5 class=" font-weight-light text-muted mt-5 mb-5" style="text-align:justify"><?php echo $cuerpo ?></h5>
            </div>
        </div>
    </div>

    <?php
    bootstrapBody();
    kitFontBody();
    require('Footer.html');
    ?>
</body>

</html>
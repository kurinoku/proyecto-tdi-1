<?php
require_once "_init.php";
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Noticias</title>
    <?php
    bootstrapHead();
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación primaria-->
        <?php require __DIR__ . "/../navbar_index_1.php" ?>
        <!-- Barra de navegación secundaria -->
        <?php require __DIR__ . "/../navbar_index_2.php" ?>
        <!-- Page Heading -->
        <h1 class="my-4">Noticias</h1>
        <div class="row">
            <!-- Tarjetas de noticias -->
            <?php
            $i = 0;
            $consulta = "SELECT * FROM noticia ORDER BY Id_noticia DESC";
            $resultado = mysqli_query($conexion, $consulta);
            while ($row = mysqli_fetch_assoc($resultado)) {
                $nombre = $row['Nombre_noticia'];
                $cuerpo = $row['Cuerpo_noticia'];
                $id = $row['Id_noticia'];
                $foto1 = $row['Ruta_portada'];
            ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <img src=<?php echoRutaComillas($foto1);  ?> class="card-img-top" alt="...">
                            <h4 class="card-title">
                                <?php
                                echo '<a class="link-dark" href="' . buildRuta("ver_noticia.php?seleccionado=" . $id) . '">' . $nombre . '</a>';
                                ?>
                            </h4>
                            <p class="card-text text-truncate"><?php echo $cuerpo ?></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php
    bootstrapBody();
    kitFontBody();
    require('Footer.html');
    ?>
</body>

</html>
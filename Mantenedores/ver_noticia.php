<?php
require_once "_init.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticias</title>
    <?php
    bootstrapHead();

    ?>    
</head>
<body>

    <!-- Barra de navegacion general copiada de index -->
    <nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href=<?php echoRutaComillas("index.php") ?>>Municipalidad de Concepción</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TipoLogin">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="TipoLogin" class="collapse navbar-collapse">
                <button type="button" class="btn btn-secondary bg-dark ms-auto" onclick=<?php echo "\"location.href='" . buildRuta("login_persona.php") . "'\""; ?>>
                    <?php session_start();if (isset($_SESSION['tipo'])){
                        echo "Ir a cuenta";
                        }else{
                        echo "Iniciar Sesión";
                        }
                    ?>
                </button>
            </div>
        </div>
    </nav>


    <?php
        require('conexion_p.php');
        $id=$_GET['seleccionado'];
        $consulta = "SELECT * FROM noticia WHERE Id_noticia='$id'";
	    $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $nombre = $row['Nombre_noticia'];
        $cuerpo = $row['Cuerpo_noticia'];
        $foto1 = $row['Ruta_portada'];
        $foto2 = $row['Ruta_foto'];
        $fecha = $row['Fecha'];
	    
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img class="img-fluid pt-1 w-100" src=<?php echoRutaComillas($foto1 . ".jpg") ?> alt="">
            </div>
        </div>

        <div class="row mb-4 mt-5">
            <h1 class="text-center "><?php echo $nombre ?></h1>
            <h6 class="text-muted"><?php echo $fecha ?></h6>
        </div>
    

        <div class="row mb-5 mt-4 ">
            <div class="">
                <img class="img-fluid img-thumbnail m-3 w-50 shadow-lg" style="float:right;" src=<?php echoRutaComillas($foto2 . ".jpg") ?> alt="">
                <h5 class=" font-weight-light text-muted" style ="text-align:justify"><?php echo $cuerpo ?></h5>
            </div>

            
        </div>

        <div class="row">
            
        </div>

    </div>

    <?php
    bootstrapBody();
    ?>
</body>
</html>
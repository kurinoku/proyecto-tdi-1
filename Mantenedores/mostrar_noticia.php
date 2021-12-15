<?php
require('conexion_p.php');
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>


<!-- Barra de navegacion general copiada de index -->
<nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href="../index.php">Municipalidad de Concepción</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TipoLogin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="TipoLogin" class="collapse navbar-collapse">
            <button type="button" class="btn btn-secondary bg-dark ms-auto"onclick="location.href='../login_persona.php'">
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
    
<div class="container">
   
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
                    <a href="ver_noticia.php?seleccionado= <?php echo $id ?>"><img class="card-img-top" src="../<?php echo $foto1 ?>.jpg" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                        <a href="ver_noticia.php?seleccionado= <?php echo $id ?>"><?php echo $nombre ?></a>
                        </h4>
                        <p class="card-text text-truncate"><?php echo $cuerpo ?></p>
                    </div>
                </div>
            </div>

            <?php
            
        }
    ?>

        
        <!-- Plantilla de carta de noticia
        <div class="col-lg-4 col-sm-6 mb-4">
            <div class="card h-100">
                <a href="#"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt=""></a>
                <div class="card-body">
                    <h4 class="card-title">
                    <a href="#">Project Six</a>
                    </h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum
                    suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates,
                    nemo repellat fugiat excepturi! Nemo, esse.</p>
                </div>
            </div>
        </div> -->

    </div>
    <!-- /.row -->

    <!-- Pagination no funcional aun-->
    <!-- <ul class="pagination justify-content-center">
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
        </a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
        </a>
    </li>
    </ul> -->

</div>

</body>
</html>
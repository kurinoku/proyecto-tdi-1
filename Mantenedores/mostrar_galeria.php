<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Galeria</title>
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
  <div class="row">
    <?php
      require('conexion_p.php');

      $consulta = "SELECT * FROM foto";
      $resultado = mysqli_query($conexion, $consulta);
      while ($row = mysqli_fetch_assoc($resultado)) {
          $nombre = $row['Nombre_foto'];
          $ruta = $row['Ruta_foto'];
          $fecha = $row['Fecha'];
          ?>

          <div class="col-lg-3 col-md-6 mb-4 mt-2">
            <div class="card border-0 shadow h-100">
              <img src="../<?php echo $ruta ?>" class="card-img-top" alt="...">
              <div class="card-body text-center">
                <h5 class="card-title mb-0"><?php echo $nombre ?></h5>
                <div class="card-text text-black-50"><?php echo $fecha ?></div>
              </div>
            </div>
          </div>

        <?php
      }
    ?>

  
   
    
  </div>

</div>

</body>
</html>
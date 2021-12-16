<?php
require_once "_init.php";
require('conexion_p.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <?php
    bootstrapHead();
    ?>
    <title>Galeria</title>
</head>
<body>


<?php require __DIR__ . "/../navbar_index_1.php" ?>
    
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
<?php
    bootstrapBody();
    ?>

</body>
</html>
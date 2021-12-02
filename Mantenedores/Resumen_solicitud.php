<?php
require_once 'conexion_p.php';
require_once('../auth_admin.php');
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">


    <title>Resumen de solicitudes</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">   
    <link href="../css/Resumen_solicitud.css" rel="stylesheet">
  </head>

  <body class="d-flex flex-column min-vh-100">
      
    

    <div class="container-fluid">
        <?php
        require('Navbar_administrador.html');
        ?>
        <div class="row">       
            <div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Resumen de solicitudes</h1>
                        
                    </div>

                    <?php              
                        require_once('Graficos_tipo.php');                     
                        require_once('Graficos_estado.php');
                    ?>
                    <h2>Grafica de estado de la solicitud</h2>
                    <canvas class="my-4" id="Grafico_Estado" width="900" height="380"></canvas>
                    <h2>Grafica del tipo de solicitud</h2>
                    <canvas class="my-4" id="Grafico_Tipo" width="900" height="380"></canvas>

                    
                    <div class="table-responsive">
                        <div class="col-lg-12 col-md-12 ps-1">
                            <legend class="text-center pt-3">Registro de las Solicitudes</legend>
                            <table class="table table-striped table-hover">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Codigo departamento</th>
                                        <th>Rut persona</th>
                                        <th>Tipo retroalimentacion</th>
                                        <th>Descripcion</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <?php
                                $consulta = "SELECT * FROM `solicitud` ORDER BY `Creada_solicitud` DESC";
                                $resultado = mysqli_query($conexion, $consulta);
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $Cod = $row['Codigo_solicitud'];
                                    $Codigo = $row['Codigo_dep'];
                                    $Rut = $row['Rut_persona'];
                                    $Tipo = $row['Tipo_solicitud'];
                                    $Descripcion = $row['Descripcion_solicitud'];
                                    $Estado = $row['Estado_solicitud'];
                                    $Fecha = $row['Creada_solicitud'];
                                    echo "<tr>";
                                    echo "<td>" . $Cod . "</td>";
                                    echo "<td>" . $Codigo . "</td>";
                                    echo "<td>" . $Rut . "</td>";
                                    echo "<td>" . $Tipo . "</td>";
                                    echo "<td>" . $Descripcion . "</td>";
                                    echo "<td>" . $Estado . "</td>";
                                    echo "<td>" . $Fecha . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
    

    

   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>   
        
        <script src="resumen_solicitud.js"></script>
        
    </body>
    
</html>
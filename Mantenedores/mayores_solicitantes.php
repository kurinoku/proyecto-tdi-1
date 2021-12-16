<?php
require_once 'conexion_p.php';
authUser('admin');
?>

<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>Resumen de solicitudes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container-fluid">
            <?php
            require('Navbar_administrador.html');
            ?>
            
                
                <div>
                    <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                            <h2 class="h2">Personas con mayor cantidad de:</h2>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" style="color: black" id="nav-solicitudes-tab" data-bs-toggle="tab" data-bs-target="#nav-solicitudes" type="button" role="tab" aria-controls="nav-solicitudes" aria-selected="true">Solicitudes</button>
                                <button class="nav-link" style="color: black" id="nav-reclamos-tab" data-bs-toggle="tab" data-bs-target="#nav-reclamos" type="button" role="tab" aria-controls="nav-reclamos" aria-selected="false">Reclamos</button>
                                <button class="nav-link" style="color: black" id="nav-sugerencias-tab" data-bs-toggle="tab" data-bs-target="#nav-sugerencias" type="button" role="tab" aria-controls="nav-sugerencias" aria-selected="false">Sugerencias</button>
                                <button class="nav-link" style="color: black" id="nav-felicitaciones-tab" data-bs-toggle="tab" data-bs-target="#nav-felicitaciones" type="button" role="tab" aria-controls="nav-felicitaciones" aria-selected="false">Felicitaciones</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-solicitudes" role="tabpanel" aria-labelledby="nav-solicitudes-tab">
                                <div class="table-responsive">
                                    <div class="col-lg-6 col-md-6 ps-1">
                                        <legend class="text-center pt-3">Personas con mas solicitudes</legend>
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de reclamos</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $consulta = "SELECT Rut_persona, count(*) AS cantidad FROM solicitud GROUP BY Rut_persona ASC HAVING COUNT(*)>=1 ORDER BY `cantidad` DESC LIMIT 5;";
                                                $resultado = mysqli_query($conexion, $consulta);
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    $Rut = $row['Rut_persona'];
                                                    $cant = $row['cantidad'];
                                                    $consulta3 = "SELECT Nombre_persona FROM `persona` WHERE Rut_persona=$Rut";
                                                    $resultado3 = mysqli_query($conexion, $consulta3);
                                                    $row = mysqli_fetch_assoc($resultado3);
                                                    $Nombre = $row['Nombre_persona'];
                                                    echo "<tr>";
                                                    echo "<td>" . $Nombre . "</td>";
                                                    echo "<td>" . $Rut . "</td>";
                                                    echo "<td>" . $cant . "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>        
                            </div>
                            <div class="tab-pane fade" id="nav-reclamos" role="tabpanel" aria-labelledby="nav-reclamos-tab">
                                <div class="table-responsive">
                                    <div class="col-lg-6 col-md-6 ps-1">
                                        <legend class="text-center pt-3">Personas con mas reclamos</legend>
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de reclamos</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $consulta = "SELECT Rut_persona, count(*) AS cantidad FROM solicitud WHERE tipo_solicitud='Reclamo' GROUP BY Rut_persona ASC HAVING COUNT(*)>=1 ORDER BY `cantidad` DESC LIMIT 5;";
                                                $resultado = mysqli_query($conexion, $consulta);
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    $Rut = $row['Rut_persona'];
                                                    $cant = $row['cantidad'];
                                                    $consulta3 = "SELECT Nombre_persona FROM `persona` WHERE Rut_persona=$Rut";
                                                    $resultado3 = mysqli_query($conexion, $consulta3);
                                                    $row = mysqli_fetch_assoc($resultado3);
                                                    $Nombre = $row['Nombre_persona'];
                                                    echo "<tr>";
                                                    echo "<td>" . $Nombre . "</td>";
                                                    echo "<td>" . $Rut . "</td>";
                                                    echo "<td>" . $cant . "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>                    
                            </div>
                            <div class="tab-pane fade" id="nav-sugerencias" role="tabpanel" aria-labelledby="nav-sugerencias-tab">
                                <div class="table-responsive">
                                    <div class="col-lg-6 col-md-6 ps-1">
                                        <legend class="text-center pt-3">Personas con mas sugerencias</legend>
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de sugerencias</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $consulta = "SELECT Rut_persona, count(*) AS cantidad FROM solicitud WHERE tipo_solicitud='Sugerencia' GROUP BY Rut_persona ASC HAVING COUNT(*)>=1 ORDER BY `cantidad` DESC LIMIT 5;";
                                                $resultado = mysqli_query($conexion, $consulta);
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    $Rut = $row['Rut_persona'];
                                                    $cant = $row['cantidad'];
                                                    $consulta3 = "SELECT Nombre_persona FROM `persona` WHERE Rut_persona=$Rut";
                                                    $resultado3 = mysqli_query($conexion, $consulta3);
                                                    $row = mysqli_fetch_assoc($resultado3);
                                                    $Nombre = $row['Nombre_persona'];
                                                    echo "<tr>";
                                                    echo "<td>" . $Nombre . "</td>";
                                                    echo "<td>" . $Rut . "</td>";
                                                    echo "<td>" . $cant . "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>                    
                            </div>
                            <div class="tab-pane fade" id="nav-felicitaciones" role="tabpanel" aria-labelledby="nav-felicitaciones-tab">
                                <div class="table-responsive">
                                    <div class="col-lg-6 col-md-6 ps-1">
                                        <legend class="text-center pt-3">Personas con mas felicitaciones</legend>
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de sugerencias</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                $consulta = "SELECT Rut_persona, count(*) AS cantidad FROM solicitud WHERE tipo_solicitud='Felicitaciones' GROUP BY Rut_persona ASC HAVING COUNT(*)>=1 ORDER BY `cantidad` DESC LIMIT 5;";
                                                $resultado = mysqli_query($conexion, $consulta);
                                                while ($row = mysqli_fetch_assoc($resultado)) {
                                                    $Rut = $row['Rut_persona'];
                                                    $cant = $row['cantidad'];
                                                    $consulta3 = "SELECT Nombre_persona FROM `persona` WHERE Rut_persona=$Rut";
                                                    $resultado3 = mysqli_query($conexion, $consulta3);
                                                    $row = mysqli_fetch_assoc($resultado3);
                                                    $Nombre = $row['Nombre_persona'];
                                                    echo "<tr>";
                                                    echo "<td>" . $Nombre . "</td>";
                                                    echo "<td>" . $Rut . "</td>";
                                                    echo "<td>" . $cant . "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>                    
                            </div>
                        </div>
                    </main>
                </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        
    </body>

</html>
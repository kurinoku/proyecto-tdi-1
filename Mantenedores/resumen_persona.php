<?php
require('conexion_p.php');
require_once "_init.php";
authUser('persona');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Estadísticas de la Solicitud</title>
    <!-- Links -->
    <?php
    bootstrapHead();
    ?>
    <!-- Diseños -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php
        require "navbar_persona.php";
        $user = $_SESSION['usuario'];

        $consulta = "SELECT Codigo_dep, count(*) AS cantidad FROM departamento";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        ?>
        <div class="row">
            <div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                    <div class="text-center flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                        <h2>Estadísticas de tus solicitudes</h2>
                    </div>
                        <div class="table-responsive">
                            <div class="col-lg-12 col-md-12 ps-1">
                                <table class="table table-striped table-hover">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th class="text-center">Cantidad de solicitudes</th>
                                            <th class="text-center">Cantidad de reclamos</th>
                                            <th class="text-center">Cantidad de sugerencias</th>
                                            <th class="text-center">Cantidad de felicitaciones</th>
                                        </tr>
                                    </thead>
                                    <div style="position:center">
                                        <?php
                                            $consulta = "SELECT Rut_persona, count(*) AS cantidadS FROM solicitud WHERE Rut_persona='$user'";
                                            $resultado = mysqli_query($conexion, $consulta);
                                            $row = mysqli_fetch_assoc($resultado);
                                            $cantS = $row['cantidadS'];

                                            $consulta4 = "SELECT Rut_persona, count(*) AS cantidadR FROM solicitud WHERE tipo_solicitud='Reclamo' AND Rut_persona='$user'";
                                            $resultado4 = mysqli_query($conexion, $consulta4);
                                            $row = mysqli_fetch_assoc($resultado4);
                                            $cantR = $row['cantidadR'];

                                            $consulta4 = "SELECT Rut_persona, count(*) AS cantidadSu FROM solicitud WHERE tipo_solicitud='Sugerencia' AND Rut_persona='$user'";
                                            $resultado4 = mysqli_query($conexion, $consulta4);
                                            $row = mysqli_fetch_assoc($resultado4);
                                            $cantSu = $row['cantidadSu'];

                                            $consulta4 = "SELECT Rut_persona, count(*) AS cantidadF FROM solicitud WHERE tipo_solicitud='Felicitaciones' AND Rut_persona='$user'";
                                            $resultado4 = mysqli_query($conexion, $consulta4);
                                            $row = mysqli_fetch_assoc($resultado4);
                                            $cantF = $row['cantidadF'];
                                            
                                            echo "<tr>";
                                            echo "<td class='text-center'>" . $cantS . " <button type='button' style='margin: 10px' class='btn btn-dark ver-btn' data-bs-toggle='modal' data-bs-target='#infoModal'>Ver Departamentos</button></td>";
                                            echo "<td class='text-center'>" . $cantR . " <button type='button' style='margin: 10px' class='btn btn-dark ver-btn' data-bs-toggle='modal' data-bs-target='#infoModal2'>Ver Departamentos</button></td>";
                                            echo "<td class='text-center'>" . $cantSu . " <button type='button' style='margin: 10px' class='btn btn-dark ver-btn' data-bs-toggle='modal' data-bs-target='#infoModal3'>Ver Departamentos</button></td>";
                                            echo "<td class='text-center'>" . $cantF . " <button type='button' style='margin: 10px' class='btn btn-dark ver-btn' data-bs-toggle='modal' data-bs-target='#infoModal4'>Ver Departamentos</button></td>";
                                            echo "</tr>";
                                        
                                        ?>
                                    </div>
                                </table>
                            </div>
                        </div>
                        
                </main>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex-wrap flex-md-nowrap pb-2 mb-3">
                        <span bold>Usted ha enviado solicitudes a los siguientes departamenos:</span>
                    </div>
                    
                    <?php
                    $consulta = "SELECT Codigo_dep,count(*) AS cantidad FROM solicitud WHERE Rut_persona='$user' GROUP BY Codigo_dep ASC HAVING COUNT(*)>=1 ORDER BY `cantidad`;";
                    
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $co = $row['Codigo_dep'];

                        $consulta2 = "SELECT Nombre_dep FROM departamento WHERE Codigo_dep='$co';";
                        $resultado2 = mysqli_query($conexion, $consulta2);
                        $row = mysqli_fetch_assoc($resultado2);
                        $n = $row['Nombre_dep'];

                        $consulta4 = "SELECT Codigo_dep, count(*) AS cant FROM solicitud WHERE Rut_persona='$user' AND Codigo_dep='$co'";
                        $resultado4 = mysqli_query($conexion, $consulta4);
                        $row = mysqli_fetch_assoc($resultado4);
                        $cant = $row['cant'];

                        echo "<div> - " . $n ."  ($cant)</div>";
                    }
                    
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex-wrap flex-md-nowrap pb-2 mb-3">
                        <span bold>Usted ha enviado reclamos a los siguientes departamenos:</span>
                    </div>
                    <?php
                    $consulta = "SELECT Codigo_dep,count(*) AS cantidad FROM solicitud WHERE Rut_persona='$user' AND tipo_solicitud = 'Reclamo' GROUP BY Codigo_dep ASC HAVING COUNT(*)>=1 ORDER BY `cantidad`;";
                    
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $co = $row['Codigo_dep'];

                        $consulta2 = "SELECT Nombre_dep FROM departamento WHERE Codigo_dep='$co';";
                        $resultado2 = mysqli_query($conexion, $consulta2);
                        $row = mysqli_fetch_assoc($resultado2);
                        $n = $row['Nombre_dep'];

                        $consulta4 = "SELECT Codigo_dep, count(*) AS cant FROM solicitud WHERE Rut_persona='$user'AND tipo_solicitud = 'Reclamo' AND Codigo_dep='$co'";
                        $resultado4 = mysqli_query($conexion, $consulta4);
                        $row = mysqli_fetch_assoc($resultado4);
                        $cant = $row['cant'];

                        echo "<div> - " . $n ."  ($cant)</div>";
                    }
                    
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex-wrap flex-md-nowrap pb-2 mb-3">
                        <span bold>Usted ha enviado sugerencias a los siguientes departamenos:</span>
                    </div>
                        <?php
                        $consulta = "SELECT Codigo_dep,count(*) AS cantidad FROM solicitud WHERE Rut_persona='$user' AND tipo_solicitud = 'Sugerencia' GROUP BY Codigo_dep ASC HAVING COUNT(*)>=1 ORDER BY `cantidad`;";
                        
                        $resultado = mysqli_query($conexion, $consulta);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            $co = $row['Codigo_dep'];

                            $consulta2 = "SELECT Nombre_dep FROM departamento WHERE Codigo_dep='$co';";
                            $resultado2 = mysqli_query($conexion, $consulta2);
                            $row = mysqli_fetch_assoc($resultado2);
                            $n = $row['Nombre_dep'];

                            $consulta4 = "SELECT Codigo_dep, count(*) AS cant FROM solicitud WHERE Rut_persona='$user'AND tipo_solicitud = 'Sugerencia' AND Codigo_dep='$co'";
                            $resultado4 = mysqli_query($conexion, $consulta4);
                            $row = mysqli_fetch_assoc($resultado4);
                            $cant = $row['cant'];

                            echo "<div> - " . $n ."  ($cant)</div>";
                        }
                        
                        ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Departamentos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex-wrap flex-md-nowrap pb-2 mb-3">
                        <span bold>Usted ha enviado felicitaciones a los siguientes departamenos:</span>
                    </div>
                    <?php
                    $consulta = "SELECT Codigo_dep,count(*) AS cantidad FROM solicitud WHERE Rut_persona='$user' AND tipo_solicitud = 'Felicitaciones' GROUP BY Codigo_dep ASC HAVING COUNT(*)>=1 ORDER BY `cantidad`;";
                    
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $co = $row['Codigo_dep'];

                        $consulta2 = "SELECT Nombre_dep FROM departamento WHERE Codigo_dep='$co';";
                        $resultado2 = mysqli_query($conexion, $consulta2);
                        $row = mysqli_fetch_assoc($resultado2);
                        $n = $row['Nombre_dep'];

                        $consulta4 = "SELECT Codigo_dep, count(*) AS cant FROM solicitud WHERE Rut_persona='$user'AND tipo_solicitud = 'Felicitaciones' AND Codigo_dep='$co'";
                        $resultado4 = mysqli_query($conexion, $consulta4);
                        $row = mysqli_fetch_assoc($resultado4);
                        $cant = $row['cant'];

                        echo "<div> - " . $n ."  ($cant)</div>";
                    }
                    
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <?php
    require('Footer.html');
    kitFontBody();
    bootstrapBody();
    echoScript("Mantenedores/modificar_solicitud.js");
    ?>
</body>

</html>
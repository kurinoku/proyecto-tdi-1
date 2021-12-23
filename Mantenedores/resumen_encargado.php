<?php
require('conexion_p.php');
require_once "_init.php";
authUser('encargado');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Estadísticas de las Solicitudes</title>
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
        require "navbar_encargado.php";
        $user = $_SESSION['usuario'];
        $consulta = "SELECT * FROM departamento WHERE Rut_encargado = '$user'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $cod = $row['Codigo_dep'];
        ?>
        <div class="row">
            <div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                    <div class="text-center flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                        <h2>Personas con mayor cantidad de solicitudes</h2>
                    </div>
                        <div class="table-responsive">
                            <div class="col-lg-12 col-md-12 ps-1">
                                <table class="table table-striped table-hover">
                                    <thead class="bg-dark text-light">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Rut</th>
                                            <th>Cantidad de solicitudes</th>
                                            <th>Cantidad de reclamos</th>
                                            <th>Cantidad de sugerencias</th>
                                            <th>Cantidad de felicitaciones</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $consulta = "SELECT Rut_persona, count(*) AS cantidadS FROM solicitud WHERE Codigo_dep='$cod' GROUP BY Rut_persona ASC HAVING COUNT(*)>=1 ORDER BY `cantidadS` DESC LIMIT 5;";
                                    $resultado = mysqli_query($conexion, $consulta);
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        $Rut = $row['Rut_persona'];
                                        $cantS = $row['cantidadS'];

                                        $consulta3 = "SELECT Nombre_persona FROM `persona` WHERE Rut_persona=$Rut";
                                        $resultado3 = mysqli_query($conexion, $consulta3);
                                        $row = mysqli_fetch_assoc($resultado3);
                                        $Nombre = $row['Nombre_persona'];

                                        $consulta4 = "SELECT Rut_persona, count(*) AS cantidadR FROM solicitud WHERE tipo_solicitud='Reclamo' AND Codigo_dep='$cod' AND Rut_persona='$Rut'";
                                        $resultado4 = mysqli_query($conexion, $consulta4);
                                        $row = mysqli_fetch_assoc($resultado4);
                                        $cantR = $row['cantidadR'];

                                        $consulta4 = "SELECT Rut_persona, count(*) AS cantidadSu FROM solicitud WHERE tipo_solicitud='Sugerencia' AND Codigo_dep='$cod' AND Rut_persona='$Rut'";
                                        $resultado4 = mysqli_query($conexion, $consulta4);
                                        $row = mysqli_fetch_assoc($resultado4);
                                        $cantSu = $row['cantidadSu'];

                                        $consulta4 = "SELECT Rut_persona, count(*) AS cantidadF FROM solicitud WHERE tipo_solicitud='Felicitaciones' AND Codigo_dep='$cod' AND Rut_persona='$Rut'";
                                        $resultado4 = mysqli_query($conexion, $consulta4);
                                        $row = mysqli_fetch_assoc($resultado4);
                                        $cantF = $row['cantidadF'];

                                        echo "<tr>";
                                        echo "<td>" . $Nombre . "</td>";
                                        echo "<td>" . $Rut . "</td>";
                                        echo "<td>" . $cantS . "</td>";
                                        echo "<td>" . $cantR . "</td>";
                                        echo "<td>" . $cantSu . "</td>";
                                        echo "<td>" . $cantF . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                </main>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="text-center">Grafica cantidad de solicitudes</h3>
                <canvas class="my-4" id="Grafico" width="100%" height="70%"></canvas>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <!-- Footer -->
    <?php
    require('Footer.html');
    kitFontBody();
    bootstrapBody();
    echoScript("Mantenedores/resumen_encargado.js");
    ?>
</body>

</html>
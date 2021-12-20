<?php
require_once 'conexion_p.php';
require_once '_init.php';
authUser('admin');
?>

<!doctype html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="utf-8">
    <title>Resumen de solicitudes</title>
    <?php
    bootstrapHead();
    echoCSSLink("css/Resumen_solicitud.css");
    ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body class="d-flex flex-column min-vh-100">

    <body class="d-flex flex-column min-vh-100">
        <div class="container-fluid">
            <?php
            require('Navbar_administrador.php');
            ?>
            <div class="row">
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                    <div class="text-center flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                        <h1>Resumen de solicitudes</h1>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="text-center">Grafica de estado de la solicitud</h3>
                            <canvas class="my-4" id="Grafico_Estado" width="100%" height="70%"></canvas>
                        </div>
                        <div class="col-6">
                            <h3 class="text-center">Grafica del tipo de solicitud</h2>
                                <canvas class="my-4" id="Grafico_Tipo" width="100%" height="70%"></canvas>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="col-lg-12 col-md-12 ps-1">
                            <legend class="text-center pt-3">Registro de las Solicitudes</legend>
                            <table id="table" class="table table-striped table-hover">
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
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="mt-4 text-center">Personas con mayor cantidad de:</h3>
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
                                    <div class="col-lg-12 col-md-12 ps-1">
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de solicitudes</th>
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
                                    <div class="col-lg-12 col-md-12 ps-1">
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
                                    <div class="col-lg-12 col-md-12 ps-1">
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
                                    <div class="col-lg-12 col-md-12 ps-1">
                                        <table class="table table-striped table-hover">
                                            <thead class="bg-dark text-light">
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Rut</th>
                                                    <th>Cantidad de felicitaciones</th>
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
                    </div class="col-lg-12">
                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <?php
        bootstrapBody();
        echoScript("Mantenedores/resumen_solicitud.js");
        ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
        <script src="cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"></script>
        <script>
            $(document).ready(function() {
                $('#table').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"
                    }
                }); {}
            });
        </script>
        <?php
        require('Footer.html');
        kitFontBody();
        ?>
    </body>

</html>
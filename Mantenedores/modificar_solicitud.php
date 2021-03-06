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
    <title>Registro de la Solicitud</title>
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
                        <div class="table-responsive">
                            <div class="text-center flex-wrap flex-md-nowrap pb-2 mb-3 border-bottom">
                                <h1>Tabla de solicitudes</h1>
                            </div>
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
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <?php
                                $consulta = "SELECT * FROM solicitud WHERE Codigo_dep = '$cod'";
                                $resultado = mysqli_query($conexion, $consulta);
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $Cod = $row['Codigo_solicitud'];
                                    $Codigo = $row['Codigo_dep'];
                                    $Rut = $row['Rut_persona'];
                                    $Tipo = $row['Tipo_solicitud'];
                                    $Descripcion = $row['Descripcion_solicitud'];
                                    $Estado = $row['Estado_solicitud'];
                                    $Fecha = $row['Creada_solicitud'];
                                    echo "<tr x-codigo='$Cod'>";
                                    echo "<td>" . $Cod . "</td>";
                                    echo "<td>" . $Codigo . "</td>";
                                    echo "<td>" . $Rut . "</td>";
                                    echo "<td>" . $Tipo . "</td>";
                                    echo "<td>" . $Descripcion . "</td>";
                                    echo "<td>" . $Estado . "</td>";
                                    echo "<td>" . $Fecha . "</td>";
                                    echo "<td> <button x-codigo='$Cod' type='button' class='btn btn-primary ver-btn' data-bs-toggle='modal' data-bs-target='#infoModal'>Ver</button></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
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
                    <h5 class="modal-title" id="exampleModalLabel">Visualización de estado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span bold>Estado:</span>
                    <div id="estadoModal"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnActualizar">Actualizar</button>

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
        $(document).ready(function() {
            $('#table2').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"
                }
            }); {}
        });
    </script>
</body>

</html>
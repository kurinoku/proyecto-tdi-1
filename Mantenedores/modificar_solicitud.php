<?php
require('conexion_p.php');
require('../auth_encargado.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de la Solicitud</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Diseños -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php
        require('navbar_encargado.html');
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
                        <div class="col-lg-12 col-md-12 ps-1">
                            <legend class="text-center pt-3">Tabla de Solicitudes</legend>
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
    ?>

    <script src="https://kit.fontawesome.com/45eaee4fa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="modificar_solicitud.js"></script>
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
</body>

</html>
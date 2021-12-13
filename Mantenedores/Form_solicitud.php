<?php
require('conexion_p.php');
require('../auth_usuario.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de la Solicitud</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación -->
        <?php

        require('navbar_persona.html');
        ?>
        <!-- Contenedor del Formulario y la Tabla -->
        <div class="row flex-lg-row">

            <?php

            $user = $_SESSION['usuario'];
            $consulta = "SELECT * FROM persona WHERE Rut_persona = '$user'";
            $resultado = mysqli_query($conexion, $consulta);
            $row = mysqli_fetch_assoc($resultado);
            $rut = $row['Rut_persona'];
            $nombre = $row['Nombre_persona'];


            ?>

            <!-- Formulario -->
            <div class="col-lg-6 col-md-12">
                <form action="ingresar_solicitud.php" method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para añadir Solicitud</legend>
                        <div class="form-group row">
                            <div class="form-group mt-2">
                                <label>Nombre persona</label>
                                <input type="text" name="" class="form-control" placeholder="<?php echo $nombre ?>" aria-label="Disabled input example" Disabled>
                            </div>
                            <div class="form-group mt-2">
                                <label>Rut persona</label>
                                <input type="text" name="Rut_persona" class="form-control" placeholder="<?php echo $rut ?>" aria-label="Disabled input example" Disabled>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <select name="departamento" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled selected>Selecciona el departamento</option>
                                    <?php
                                    $consulta = "SELECT * FROM departamento";
                                    $resultado = mysqli_query($conexion, $consulta);
                                    while ($row = mysqli_fetch_assoc($resultado)) {
                                        $nombredep = $row['Nombre_dep'];
                                        $codigodep = $row['Codigo_dep'];
                                    ?>
                                        <option value="<?php echo $codigodep ?>"><?php echo $nombredep ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label for="retroalimentacion">Tipo de retroalimentación:</label>
                                <select name="retroalimentacion" class="form-select" aria-label="Default select example" required>
                                    <option value="" disabled selected>Selecciona el tipo de retroalimentacion</option>
                                    <option value="Sugerencia">Sugerencia</option>
                                    <option value="Reclamo">Reclamo</option>
                                    <option value="Felicitacion">Felicitación</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Descripcion</label>
                                <textarea type="text" name="Descripcion_solicitud" class="form-control" placeholder="Muy buena atención..." required></textarea>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Solicitud</button>
                    </div>
                </form>
            </div>

            <!-- Tabla -->
            <div class="col-lg-6 col-md-12 ps-1">
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
                        </tr>
                    </thead>
                    <?php
                    $consulta = "SELECT * FROM solicitud WHERE Rut_persona = '$user'";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $Cod = $row['Codigo_solicitud'];
                        $Codigo = $row['Codigo_dep'];
                        $Rut = $row['Rut_persona'];
                        $Tipo = $row['Tipo_solicitud'];
                        $Descripcion = $row['Descripcion_solicitud'];
                        $Estado = $row['Estado_solicitud'];
                        echo "<tr>";
                        echo "<td>" . $Cod . "</td>";
                        echo "<td>" . $Codigo . "</td>";
                        echo "<td>" . $Rut . "</td>";
                        echo "<td>" . $Tipo . "</td>";
                        echo "<td>" . $Descripcion . "</td>";
                        echo "<td>" . $Estado . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require('Footer.html');
    ?>
    <script src="https://kit.fontawesome.com/45eaee4fa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="../util/util.js"></script>
    <script src="validacion.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json"></script>
    <script>
        let valida = new ValidaPaginas();
        valida.magia();
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
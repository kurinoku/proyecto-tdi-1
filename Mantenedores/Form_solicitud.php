<?php
require_once "_init.php";
require('conexion_p.php');
authUser('persona');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Registro de la Solicitud</title>
    <?php
    bootstrapHead();
    require 'head_form.php';
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación -->
        <?php
        require "navbar_persona.php";
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
            <div class="col-lg-3 col-md-12">
                <form action=<?php echoRutaComillas("Mantenedores/ingresar_solicitud.php"); ?> method="post">
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
                                    <option value="Felicitaciones">Felicitación</option>
                                </select>
                            </div>
                            <div class="form-group mt-2">
                                <label>Descripcion</label>
                                <textarea onkeyup="contarCaracteres(this);" maxlength="500" type="text" name="Descripcion_solicitud" class="form-control" placeholder="Muy buena atención..." required></textarea>
                                <p id="charNum"></p>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Solicitud</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            <div class="col-lg-9 col-md-12 ps-1 pb-5">
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
                            <th>Acción</th>
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
                        echo '<tr>';
                        echo '<td id="cod">' . $Cod . '</td>';
                        echo '<td id="cod_dep">' . $Codigo . '</td>';
                        echo '<td id="rut">' . $Rut . '</td>';
                        echo '<td id="tipo">' . $Tipo . '</td>';
                        echo '<td id="descripcion">' . $Descripcion . '</td>';
                        echo '<td id="estado">' . $Estado . '</td>';
                        echo '<td class="ps-3"><a href="' .   buildRuta('Mantenedores/generar_pdf_solicitud.php?codigo=' . $Cod) . '" class="btn btn-primary"><i class="fas fa-file-pdf"></i></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require('Footer.html');
    kitFontBody();
    bootstrapBody();
    echoScript('util/util.js');
    echoScript('Mantenedores/validacion.js');
    ?>
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

        function contarCaracteres(obj) {
            var maxLength = 500;
            var strLength = obj.value.length;
            if (strLength < 2) {
                document.getElementById("charNum").innerHTML = strLength + ' caracter de ' + maxLength + ' caracteres.';
            } else if (strLength > 1 && strLength <= 500) {
                document.getElementById("charNum").innerHTML = strLength + ' caracteres de ' + maxLength + ' caracteres.';
            }
        }
    </script>
</body>

</html>
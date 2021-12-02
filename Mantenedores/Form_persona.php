<?php
$NOMBRE = 'Ciudadano';
require('head_form.php');
require('../auth_admin.php');
?>

<div class="container-fluid">
    <!-- Barra de navegación -->
    <?php
    require('Navbar_administrador.html');
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-6 col-md-12">
            <form action="ingresar_persona.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir persona</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>RUT Persona</label>
                            <input type="text" name="Rut_persona" class="form-control" placeholder="11111111" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Id municipalidad</label>
                            <input type="text" name="Id_municipalidad" class="form-control" placeholder="12345" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre de la Persona</label>
                            <input type="text" name="Nombre_persona" class="form-control" placeholder="Juan Quiroga Sánchez" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Número</label>
                            <input type="text" name="Numero_persona" class="form-control" placeholder="978451232" required>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" name="Correo_persona" class="form-control" placeholder="alguien@example.com" required>
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            <input type="text" name="Clave_persona" class="form-control" placeholder="********" required>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Persona</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-6 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de las Personas</legend>
            <table class="table table-striped table-hover">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Rut</th>
                        <th>Id Municipalidad</th>
                        <th>Nombre</th>
                        <th>Numero</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                $consulta = "SELECT * FROM persona";
                $resultado = mysqli_query($conexion, $consulta);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $rut = $row['Rut_persona'];
                    $municipalidad = $row['Id_municipalidad'];
                    $nombre = $row['Nombre_persona'];
                    $numero = $row['Numero_persona'];
                    $correo = $row['Correo_persona'];
                    $clave = $row['Clave_persona'];
                    echo "<tr>";
                    echo "<td>" . $rut . "</td>";
                    echo "<td>" . $municipalidad . "</td>";
                    echo "<td>" . $nombre . "</td>";
                    echo "<td>" . $numero . "</td>";
                    echo "<td>" . $correo . "</td>";
                    echo "<td><a href='eliminar_persona.php?seleccionado=" . $rut . "'>Eliminar</a> <a href='editar_persona.php?seleccionado=" . $rut . "'>Editar</a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
require('bottom_form.php');
?>
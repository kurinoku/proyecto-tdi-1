<?php
$NOMBRE = 'Encargado';
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
            <form action="ingresar_encargado.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir Encargado</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>RUT</label>
                            <input type="text" name="Rut_encargado" class="form-control" placeholder="12345678 (Sin guión)" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre</label>
                            <input type="text" name="Nombre_encargado" class="form-control" placeholder="Nombre completo" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Número de celular</label>
                            <input type="text" name="Numero_encargado" class="form-control" placeholder="991738264" required>
                            <small class="form-text text-muted">Utiliza un número de celular que ocupes de manera recurrente.</small>
                        </div>
                        <div class="form-group mt-2">
                            <label>E-mail</label>
                            <input type="email" name="Correo_encargado" class="form-control" placeholder="alguien@example.com" required>
                            <small class="form-text text-muted">Utiliza un correo principal y no lo compartas con nadie.</small>
                        </div>
                        <div class="form-group mt-2">
                            <label>Contraseña</label>
                            <input type="password" name="Clave_encargado" class="form-control" placeholder="********" required>
                            <small class="form-text text-muted">Utiliza contraseña segura entre 8 y 16 caracteres.</small>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Encargado</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-6 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de los encargados</legend>
            <table class="table table-striped table-hover">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>N° Celular</th>
                        <th>E-mail</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                $consulta = "SELECT * FROM encargado";
                $resultado = mysqli_query($conexion, $consulta);

                while ($row = mysqli_fetch_assoc($resultado)) {
                    $Rut = $row['Rut_encargado'];
                    $Nombre = $row['Nombre_encargado'];
                    $Numero = $row['Numero_encargado'];
                    $Correo = $row['Correo_encargado'];
                    $Clave = $row['Clave_encargado'];

                    echo "<tr>";
                    echo "<td>" . $Rut . "</td>";
                    echo "<td>" . $Nombre . "</td>";
                    echo "<td>" . $Numero . "</td>";
                    echo "<td>" . $Correo . "</td>";
                    echo "<td><a href='eliminar_encargado.php?seleccionado=" . $Rut . "'>Eliminar</a> <a href='editar_encargado.php?seleccionado=" . $Rut . "'>Editar</a></td>";
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
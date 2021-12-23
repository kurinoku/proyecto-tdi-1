<?php
$NOMBRE = 'Administrador';
require('head_form.php');
authUser('admin');
?>

<div class="container-fluid">
    <!-- Barra de navegación -->
    <?php
    require_once "Navbar_administrador.php";
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-3 col-md-12">
            <form action=<?php echoRutaComillas("Mantenedores/ingresar_administrador.php"); ?> method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir Administrador</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>RUT</label>
                            <input type="text" name="Rut_administrador" class="form-control" placeholder="12345678 (Sin guión)" required>
                            <div class="invalid-feedback">El rut ingresado no es válido</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre</label>
                            <input type="text" name="Nombre_administrador" class="form-control" placeholder="Nombre completo" required>
                            <div class="invalid-feedback">El nombre ingresado no es válido</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Número de celular</label>
                            <input type="text" name="Numero_administrador" class="form-control" placeholder="991738264" required>
                            <small class="form-text text-muted">Utiliza un número de celular que ocupes de manera recurrente.</small>
                            <div class="invalid-feedback">El número ingresado no es válido</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>E-mail</label>
                            <input type="email" name="Correo_administrador" class="form-control" placeholder="alguien@example.com" required>
                            <small class="form-text text-muted">Utiliza un correo principal y no lo compartas con nadie.</small>
                            <div class="invalid-feedback">El correo ingresado no es válido</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Contraseña</label>
                            <input type="password" name="Clave_administrador" class="form-control" placeholder="********" required>
                            <small class="form-text text-muted">Utiliza contraseña segura entre 8 y 16 caracteres.</small>
                            <div class="invalid-feedback">La contraseña debe contener entre 8 y 14 carácteres; Debe incluir al menos una mayúscula, una minúscula y un número</div>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Administrador</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-9 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de los administradores</legend>
            <table id="table" class="table table-striped table-hover">
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
                $consulta = "SELECT * FROM administrador";
                $resultado = mysqli_query($conexion, $consulta);

                while ($row = mysqli_fetch_assoc($resultado)) {
                    $Rut = $row['Rut_administrador'];
                    $Nombre = $row['Nombre_administrador'];
                    $Numero = $row['Numero_administrador'];
                    $Correo = $row['Correo_administrador'];
                    $Clave = $row['Clave_administrador'];

                    echo "<tr>";
                    echo "<td>" . $Rut . "</td>";
                    echo "<td>" . $Nombre . "</td>";
                    echo "<td>" . $Numero . "</td>";
                    echo "<td>" . $Correo . "</td>";
                    echo "<td><a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/eliminar_administrador.php?seleccionado=" . $Rut ) . "\">Eliminar</a> <a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/editar_administrador.php?seleccionado=" . $Rut ) . "\">Editar</a></td>";
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
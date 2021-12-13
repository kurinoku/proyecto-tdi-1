<?php
$NOMBRE = 'Departamento';
require('head_form.php');
require('../auth_admin.php');
?>
<!-- Barra de navegación -->
<div class="container-fluid">
    <?php
    require('Navbar_administrador.html');
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-6 col-md-12">
            <form action="ingresar_departamento.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir Departamento</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>Codigo del departamento</label>
                            <input type="text" name="Codigo_dep" class="form-control" placeholder="12345678" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Id municipalidad</label>
                            <input type="text" name="Id_municipalidad" class="form-control" placeholder="12345" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Rut encargado</label>
                            <input type="text" name="Rut_encargado" class="form-control" placeholder="12345678 (Sin guión)" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre departamento:</label>
                            <input type="text" name="Nombre_dep" class="form-control" placeholder="Departamento las Rosas" required>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Departamento</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-6 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de los departamentos</legend>
            <table id="table" class="table table-striped table-hover">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Codigo</th>
                        <th>Id municipalidad</th>
                        <th>Rut encargado</th>
                        <th>Nombre departamento</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                $consulta = "SELECT * FROM departamento";
                $resultado = mysqli_query($conexion, $consulta);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $Codigo = $row['Codigo_dep'];
                    $Id = $row['Id_municipalidad'];
                    $Rut = $row['Rut_encargado'];
                    $Nombre = $row['Nombre_dep'];
                    echo "<tr>";
                    echo "<td>" . $Codigo . "</td>";
                    echo "<td>" . $Id . "</td>";
                    echo "<td>" . $Rut . "</td>";
                    echo "<td>" . $Nombre . "</td>";
                    echo "<td><a href='eliminar_departamento.php?seleccionado=" . $Codigo . "'>Eliminar</a> <a href='editar_departamento.php?seleccionado=" . $Codigo . "'>Editar</a></td>";
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
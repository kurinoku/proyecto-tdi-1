<?php
$NOMBRE = 'Departamento';
require('head_form.php');
authUser('admin');
?>
<!-- Barra de navegación -->
<div class="container-fluid">
    <?php
    require_once "Navbar_administrador.php";
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-3 col-md-12">
            <form action=<?php echoRutaComillas("Mantenedores/ingresar_departamento.php"); ?> method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir Departamento</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>Codigo del departamento</label>
                            <input type="text" name="Codigo_dep" class="form-control" placeholder="12345678" required>
                            <div class="invalid-feedback">El código ingresado no es válido</div>

                        </div>
                        <div class="form-group mt-2">
                        <label class="labels" for="Id_municipalidad">Municipalidad:</label>
                        <select name="Id_municipalidad" class="form-select" aria-label="Default select example" required>
                            <option value="" disabled selected>Selecciona la municipalidad</option>
                            <?php
                            require('conexion_p.php');
                            $consulta = "SELECT * FROM municipalidad";
                            $resultado = mysqli_query($conexion, $consulta);
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $nombremuni = $row['Nombre_municipalidad'];
                                $codigomuni = $row['Id_municipalidad'];
                            ?>
                                <option value="<?php echo $codigomuni ?>"><?php echo $nombremuni ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        </div>
                        <div class="form-group mt-2">
                            <label>Rut encargado</label>
                            <input type="text" name="Rut_encargado" class="form-control" placeholder="12345678 (Sin guión)" required>
                            <div class="invalid-feedback">El rut ingresado no es válido</div>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre departamento:</label>
                            <input type="text" name="Nombre_dep" class="form-control" placeholder="Departamento las Rosas" required>
                            <div class="invalid-feedback">El nombre ingresado no es válido</div>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Departamento</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-9 col-md-12 ps-1">
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
                    echo "<td><a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/eliminar_departamento.php?seleccionado=" . $Codigo ) . "\">Eliminar</a> <a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/editar_departamento.php?seleccionado=" . $Codigo ) . "\">Editar</a></td>";
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
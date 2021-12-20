<?php
$NOMBRE = 'Municipalidad';
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
            <form action=<?php echoRutaComillas("Mantenedores/ingresar_municipalidad.php"); ?> method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para añadir Municipalidad</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>Id municipalidad</label>
                            <input type="text" name="Id_municipalidad" class="form-control" placeholder="12345" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre municipalidad</label>
                            <input type="text" name="Nombre_municipalidad" class="form-control" placeholder="Municipalidad de Concepción" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Rut Administrador</label>
                            <input type="text" name="Rut_administrador" class="form-control" placeholder="12345678 (Sin guión)" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Direccion municipalidad</label>
                            <input type="text" name="Direccion_municipalidad" class="form-control" placeholder="Pasaje Barros Arana 332" required>
                        </div>
                        <div class="form-group mt-2">
                            <label>Numero municipalidad:</label>
                            <input type="text" name="Numero_municipalidad" class="form-control" placeholder="978451232" required>
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Registrar Municipalidad</button>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-9 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de la Municipalidad</legend>
            <table id="table" class="table table-striped table-hover">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Id municipalidad</th>
                        <th>Nombre municipalidad</th>
                        <th>Rut Administrador</th>
                        <th>Direccion municipalidad</th>
                        <th>Numero municipalidad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php
                $consulta = "SELECT * FROM municipalidad";
                $resultado = mysqli_query($conexion, $consulta);
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $id = $row['Id_municipalidad'];
                    $nombre = $row['Nombre_municipalidad'];
                    $Rut = $row['Rut_administrador'];
                    $direccion = $row['Direccion_municipalidad'];
                    $numero = $row['Numero_municipalidad'];
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td>" . $nombre . "</td>";
                    echo "<td>" . $Rut . "</td>";
                    echo "<td>" . $direccion . "</td>";
                    echo "<td>" . $numero . "</td>";
                    echo "<td> <a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/editar_municipalidad.php?seleccionado=" . $id ) . "\">Editar</a></td>";
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
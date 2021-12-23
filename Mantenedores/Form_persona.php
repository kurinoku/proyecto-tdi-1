<?php
$NOMBRE = 'Ciudadano';
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
            <form action=<?php echoRutaComillas("Mantenedores/ingresar_persona.php"); ?> method="post">
                <div class="row mt-3">
                    <legend class="text-center pt-3">Formulario para añadir persona</legend>
                        <div class="col-md-12 mb-3"><label class="labels">Nombre</label>
                            <input name="Nombre_persona" maxlength="40" type="text" class="form-control" placeholder="Pablo" value="" required>
                            <div class="invalid-feedback">El nombre ingresado no es válido</div>
                        </div>
                        <div class="col-md-12 mb-3"><label class="labels">Rut</label><input maxlength="8" name="Rut_persona" type="text" class="form-control" placeholder="12345678" value="" required>
                            <div class="invalid-feedback">El rut ingresado no es válido</div>
                        </div>
                        <div class="col-md-12 mb-3"><label class="labels">Numero de contacto</label><input name="Numero_persona" maxlength="9" type="text" class="form-control" placeholder="111111111" value="" required>
                            <div class="invalid-feedback">El número ingresado no es válido</div>
                        </div>
                        <div class="col-md-12 mb-3"><label class="labels">Correo</label><input name="Correo_persona" type="email" class="form-control" placeholder="ejemplo@gmail.com" value="" required>
                            <div class="invalid-feedback">El correo ingresado no es válido</div>
                        </div>
                        <div class="col-md-12 mb-3"><label class="labels">Clave de ingreso</label><input maxlength="14" name="Clave_persona" type="password" class="form-control" placeholder="*****" value="" required>
                            <div class="invalid-feedback">La contraseña debe contener entre 8 y 14 carácteres; Debe incluir al menos una mayúscula, una minúscula y un número</div>
                        </div>
                    
                    <div class="form-group">
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
                    <div class="mt-3 text-center"><button class="btn btn-primary profile-button" type="submit">Registrarse</button></div>
                </div>
            </form>
        </div>
        <!-- Tabla -->
        <div class="col-lg-9 col-md-12 ps-1">
            <legend class="text-center pt-3">Registro de las Personas</legend>
            <table id="table" class="table table-striped table-hover">
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
                    echo "<td>"."<a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/eliminar_persona.php?seleccionado=" . $rut) .  "\">Eliminar</a> <a class='btn btn-primary' href=\"" . buildRuta("Mantenedores/editar_persona.php?seleccionado=" . $rut) . "\">Editar</a>"."</td>";
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
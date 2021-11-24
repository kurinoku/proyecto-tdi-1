<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
    require('Navbar.html');
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <h4>Formulario para añadir una persona</h4>
        </div>
        <div class="col-lg-6 mb-4">
            <h4>Listado de personas</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
        <form action="ingresar_persona.php" method="post">
                    <label class="form-label d-block">Rut:</label>
                    <input type="text" name="Rut_persona" placeholder="11111111"/>
                    <label class="form-label d-block">Id municipalidad:</label>
                    <input type="text" name="Id_municipalidad" placeholder="12345"/>
                    <label class="form-label d-block">Nombre:</label>
                    <input type="text" name="Nombre_persona" placeholder="Diego Zureña"/>
                    <label class="form-label d-block">Numero:</label>
                    <input type="text" name="Numero_persona" placeholder="912345678"/>
                    <label class="form-label d-block">Correo:</label>
                    <input type="text" name="Correo_persona" placeholder="Diego@ucsc.cl"/>
                    <label class="form-label d-block">Clave:</label>
                    <input type="password" name="Clave_persona" placeholder="**********"/>
                    <button type="submit" class="d-block mt-2" style="width: 188px;">Guardar</button>
            </form> 
        </div>
        <div class="col-lg-6">
        <table class="table table-striped">
        <tr>
            <th>Rut</th>
            <th>Id Municipalidad</th>
            <th>Nombre</th>
            <th>Numero</th>
            <th>Correo</th>
            <th>Opciones</th>
        </tr>
        <?php
            $consulta = "SELECT * FROM ciudadano";
            $resultado = mysqli_query($conexion,$consulta);

            while($row = mysqli_fetch_assoc($resultado)){
                $rut = $row['Rut_persona'];
                $municipalidad = $row['Id_municipalidad'];
                $nombre = $row['Nombre_persona'];
                $numero = $row['Numero_persona'];
                $correo = $row['Correo_persona'];
                $clave = $row['Clave_persona'];
                
                echo "<tr>";
                echo "<td>".$rut."</td>";
                echo "<td>".$municipalidad."</td>";
                echo "<td>".$nombre."</td>";
                echo "<td>".$numero."</td>";
                echo "<td>".$correo."</td>";
                echo "<td><a href='eliminar_persona.php?seleccionado=".$rut."'>Eliminar</a> <a href='editar_persona.php?seleccionado=".$rut."'>Editar</a></td>";
                echo "</tr>";
            }
        ?>

        </table>
    </div>
    </div>
                

</div>

    
    
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
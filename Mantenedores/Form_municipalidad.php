<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario municipalidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
    require('Navbar.html');
    ?>

<div class="container-fluid bg-success">
    <div class="card-body bg-info">
        <div class="mb-3" style="width: 230px;">
            <div class="bg-warning m-1 ps-3 pb-2">
                <h4>Formulario para añadir una municipalidad</h4>
                <form action="ingresar_municipalidad.php" method="post">
                    <label class="form-label d-block">Id municipalidad:</label>
                    <input type="text" name="Id_municipalidad" placeholder="12345"/>
                    <label class="form-label d-block">Nombre municipalidad:</label>
                    <input type="text" name="Nombre_municipalidad" placeholder="Municipalidad de Concepción"/>
                    <label class="form-label d-block">Direccion municipalidad:</label>
                    <input type="text" name="Direccion_municipalidad" placeholder="Pasaje los conquistadores 1234"/>
                    <label class="form-label d-block">Numero municipalidad:</label>
                    <input type="text" name="Numero_municipalidad" placeholder="9252524"/>
                    <button type="submit" class="d-block mt-2" style="width: 188px;">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>    
    

    <br><br>

    <table style="width:80%">
        <tr>
            <th>Id municipalidad</th>
            <th>Nombre municipalidad</th>
            <th>Direccion municipalidad</th>
            <th>Numero municipalidad</th>
        </tr>
    

    <?php
        $consulta = "SELECT * FROM municipalidad";
        $resultado = mysqli_query($conexion,$consulta);

        while($row = mysqli_fetch_assoc($resultado)){
            $id = $row['Id_municipalidad'];
            $nombre = $row['Nombre_municipalidad'];
            $direccion = $row['Direccion_municipalidad'];
            $numero = $row['Numero_municipalidad'];
            
            echo "<tr>";
            echo "<td>".$id."</td>";
            echo "<td>".$nombre."</td>";
            echo "<td>".$direccion."</td>";
            echo "<td>".$numero."</td>";
            echo "</tr>";
        }
    ?>

    </table>
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
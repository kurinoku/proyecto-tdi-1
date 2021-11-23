<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar ciudadano</title>
</head>
<body>
    
    <form action="" method="post">
        <label>Rut:</label>
        <input type="text" name="Rut_persona"/>       

        <button type="submit">Editar</button>
    </form>

    <br><br>

    <table style="width:80%">
        <tr>
            <th>Rut</th>
            <th>Id municipalidad</th>
            <th>Nombre</th>
            <th>Numero</th>
            <th>Correo</th>
            <th>Clave</th>
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
            echo "<td>".$clave."</td>";
            echo "</tr>";
        }
    ?>

    </table>
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
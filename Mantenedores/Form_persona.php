<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario persona</title>
</head>
<body>
    
    <form action="ingresar_persona.php" method="post">
        <label>Rut:</label>
        <input type="text" name="Rut_persona"/>
        <label>Id municipalidad:</label>
        <input type="text" name="Id_municipalidad"/>
        <label>Nombre:</label>
        <input type="text" name="Nombre_persona"/>
        <label>Numero:</label>
        <input type="text" name="Numero_persona"/>
        <label>Correo:</label>
        <input type="text" name="Correo_persona"/>
        <label>Clave:</label>
        <input type="text" name="Clave_persona"/>
        

        <button type="submit">Guardar</button>
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
</body>
</html>
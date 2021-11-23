<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario municipalidad</title>
</head>
<body>
    
    <form action="ingresar_municipalidad.php" method="post">
        <label>Id municipalidad:</label>
        <input type="text" name="Id_municipalidad"/>
        <label>Nombre municipalidad:</label>
        <input type="text" name="Nombre_municipalidad"/>
        <label>Direccion municipalidad:</label>
        <input type="text" name="Direccion_municipalidad"/>
        <label>Numero municipalidad:</label>
        <input type="text" name="Numero_municipalidad"/>

        

        <button type="submit">Guardar</button>
    </form>

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
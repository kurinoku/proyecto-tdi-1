<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar administrador</title>
</head>
<body>
    
    <form action="eliminar_administrador.php" method="post">
        <label>Rut:</label>
        <input type="text" name="Rut_administrador"/>
        <button type="submit">Eliminar</button>
    </form>

    <br><br>

    <table style="width:80%">
        <tr>
            <th>Rut</th>
            <th>Nombre</th>
            <th>Numero</th>
            <th>Correo</th>
            <th>Clave</th>
        </tr>
    

    <?php
        $consulta = "SELECT * FROM administrador";
        $resultado = mysqli_query($conexion,$consulta);

        while($row = mysqli_fetch_assoc($resultado)){
            $Rut = $row['Rut_administrador'];
            $Nombre = $row['Nombre_administrador'];
            $Numero = $row['Numero_administrador'];
            $Correo = $row['Correo_trabajo'];
            $Clave = $row['Clave_ingreso'];


            echo "<tr>";
            echo "<td>".$Rut."</td>";
            echo "<td>".$Nombre."</td>";
            echo "<td>".$Numero."</td>";
            echo "<td>".$Correo."</td>";
            echo "<td>".$Clave."</td>";
            echo "</tr>";
        }
    ?>

    </table>
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
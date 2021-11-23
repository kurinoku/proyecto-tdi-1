<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar solicitudes</title>
</head>
<body>
    
    <form action="" method="post">
        <label>Codigo solicitud:</label>
        <input type="text" name="Codigo"/>
        
        <button type="submit">Editar</button>
    </form>

    <br><br>

    <table style="width:80%">
        <tr>
            <th>Codigo</th>
            <th>Codigo departamento</th>
            <th>Rut persona</th>
            <th>Tipo retroalimentacion</th>
            <th>Descripcion</th>
            <th>Estado</th>
        </tr>
    

    <?php
        $consulta = "SELECT * FROM solicitud";
        $resultado = mysqli_query($conexion,$consulta);

        while($row = mysqli_fetch_assoc($resultado)){
            $Cod = $row['Codigo'];
            $Codigo = $row['Codigo_dep'];
            $Rut = $row['Rut_persona'];
            $Tipo = $row['Tipo_retroalimentacion'];
            $Descripcion = $row['Descripcion'];
            $Estado = $row['Estado_msg'];


            echo "<tr>";
            echo "<td>".$Cod."</td>";
            echo "<td>".$Codigo."</td>";
            echo "<td>".$Rut."</td>";
            echo "<td>".$Tipo."</td>";
            echo "<td>".$Descripcion."</td>";
            echo "<td>".$Estado."</td>";
            echo "</tr>";
        }
    ?>

    </table>
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
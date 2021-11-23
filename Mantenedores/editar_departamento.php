<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar departamento</title>
</head>
<body>
    
    <form action="" method="post">
        <label>Codigo:</label>
        <input type="text" name="Codigo_dep"/>      
        <button type="submit">Editar</button>
    </form>

    <br><br>

    <table style="width:80%">
        <tr>
            <th>Codigo</th>
            <th>Id municipalidad</th>
            <th>Rut administrador</th>
            <th>Nombre departamento</th>
            <th>Encargado</th>
        </tr>
    

    <?php
        $consulta = "SELECT * FROM departamento";
        $resultado = mysqli_query($conexion,$consulta);

        while($row = mysqli_fetch_assoc($resultado)){
            $Codigo = $row['Codigo_dep'];
            $Id = $row['Id_municipalidad'];
            $Rut = $row['Rut_administrador'];
            $Nombre = $row['Nombre_dep'];
            $Encargado = $row['Encargado_departamento'];


            echo "<tr>";
            echo "<td>".$Codigo."</td>";
            echo "<td>".$Id."</td>";
            echo "<td>".$Rut."</td>";
            echo "<td>".$Nombre."</td>";
            echo "<td>".$Encargado."</td>";
            echo "</tr>";
        }
    ?>

    </table>
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario administrador</title>
</head>
<body>
    
    <form action="ingresar_administrador.php" method="post">
        <label>Rut:</label>
        <input type="text" name="Rut_administrador"/>
        <label>Nombre:</label>
        <input type="text" name="Nombre_administrador"/>
        <label>Numero:</label>
        <input type="text" name="Numero_administrador"/>
        <label>Correo:</label>
        <input type="text" name="Correo_trabajo"/>
        <label>Clave:</label>
        <input type="text" name="Clave_ingreso"/>
        

        <button type="submit">Guardar</button>
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
</body>
</html>
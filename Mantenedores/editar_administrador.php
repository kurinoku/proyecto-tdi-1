<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar administrador</title>
</head>
<body>
    
    <form action="actualizar_administrador.php" method="post">
        <label>Rut</label><input type="text" name="Rut_administrador">
        <label>Nombre</label><input type="text" name="Nombre_administrador">
        <label>Numero</label><input type="text" name="Numero_administrador">
        <label>Correo</label><input type="text" name="Correo_trabajo">
        <label>Clave</label><input type="text" name="Clave_ingreso">
        <button type="submit">Editar</button>
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
    <script src="filtrar_form.js"></script>
    <script>
        let form = document.querySelector('form');
        filtrarFormHook(
            form, 
            form.querySelector('input[type="text"]'),
            () => alert('Rut no ingresado')
        );
    </script>
</body>
</html>
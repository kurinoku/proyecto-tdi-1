<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar municipalidad</title>
</head>
<body>
    
    <form action="actualizar_municipalidad.php" method="post">
        <label>Id</label><input type="text" name="Id_municipalidad">
        <label>Nombre</label><input type="text" name="Nombre_municipalidad">
        <label>Direccion</label><input type="text" name="Direccion_municipalidad">
        <label>Numero</label><input type="text" name="Numero_municipalidad">
        <button type="submit">Editar</button>
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
    <script src="filtrar_form.js"></script>
    <script>
        let form = document.querySelector('form');
        filtrarFormHook(
            form, 
            form.querySelector('input[type="text"]'),
            () => alert('Id no ingresado')
        );
    </script>
</body>
</html>
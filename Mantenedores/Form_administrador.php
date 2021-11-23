<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-success">
    <div class="card-body bg-info">
        <div class="mb-3" style="width: 230px;">
            <div class="bg-warning m-1 ps-3 pb-2">
                <h4>Formulario para añadir un administrador</h4>
                <form action="ingresar_administrador.php" method="post">
                    <label class="form-label d-block">Rut: </label>
                    <input type="text" name="Rut_administrador" placeholder="11111111"/>
                    <label class="form-label d-block">Nombre:</label>
                    <input type="text" name="Nombre_administrador" placeholder="Juan Perez Del Campo"/>
                    <label class="form-label d-block">Numero:</label>
                    <input type="text" name="Numero_administrador" placeholder="978945612"/>
                    <label class="form-label d-block">Correo:</label>
                    <input type="text" name="Correo_trabajo" placeholder="juancampo@gmail.com"/>
                    <label class="form-label d-block">Clave:</label>
                    <input type="password" name="Clave_ingreso" placeholder="**********"/>
                    <button type="submit" class="d-block mt-2" style="width: 188px;">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>    

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
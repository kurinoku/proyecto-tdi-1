<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-success">
    <div class="card-body bg-info">
        <div class="mb-3" style="width: 230px;">
            <div class="bg-warning m-1 ps-3 pb-2">
                <h4>Formulario para añadir una solicitud</h4>
                <form action="ingresar_solicitud.php" method="post">
                    <label class="form-label d-block">Codigo departamento:</label>
                    <input type="text" name="Codigo_dep" placeholder="12345"/>
                    <label class="form-label d-block">Rut persona:</label>
                    <input type="text" name="Rut_persona" placeholder="11111111"/>
                    <label class="form-label d-block">Tipo retroalimentacion:</label>
                    <input type="text" name="Tipo_retroalimentacion" placeholder="Felicitación"/>
                    <label class="form-label d-block">Descripcion:</label>
                    <input type="text" name="Descripcion" placeholder="Muy buen servicio, Kappa."/>
                    <label class="form-label d-block">Estado:</label>
                    <input type="text" name="Estado_msg" placeholder="En espera"/>
                    <button type="submit" class="d-block mt-2" style="width: 188px;">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>   
    

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
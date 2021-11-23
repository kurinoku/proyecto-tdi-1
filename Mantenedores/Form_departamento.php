<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid bg-success">
    <div class="card-body bg-info">
        <div class="mb-3" style="width: 230px;">
            <div class="bg-warning ps-3 m-1 pb-2">
                <h4>Formulario para añadir un departamento</h4>
                <form action="ingresar_departamento.php" method="post">
                    <label class="form-label d-block">Codigo:</label>
                    <input type="text" name="Codigo_dep" placeholder="12345678"/>
                    <label class="form-label d-block">Id municipalidad:</label>
                    <input type="text" name="Id_municipalidad" placeholder="12345678"/>
                    <label class="form-label d-block">Rut administrador:</label>
                    <input type="text" name="Rut_administrador" placeholder="11111111"/>
                    <label class="form-label d-block">Nombre departamento:</label>
                    <input type="text" name="Nombre_dep" placeholder="Departamento Las Rosas"/>
                    <label class="form-label d-block">Encargado:</label>
                    <input type="text" name="Encargado_departamento" placeholder="Carlos Candia"/>
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
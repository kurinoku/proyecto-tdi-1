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
    <?php
    require('Navbar.html');
    ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <h4>Formulario para añadir un departamento</h4>
        </div>
        <div class="col-lg-6 mb-4">
            <h4>Listado de Departamentos</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-4">
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
        <div class="col-lg-6">
        <table class="table table-striped">
        <tr>
            <th>Codigo</th>
            <th>Id municipalidad</th>
            <th>Rut administrador</th>
            <th>Nombre departamento</th>
            <th>Encargado</th>
            <th>Opciones</th>
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
            echo "<td><a href='eliminar_departamento.php?seleccionado=".$Codigo."'>Eliminar</a> <a href='editar_departamento.php?seleccionado=".$Codigo."'>Editar</a></td>";
            echo "</tr>";
        }
    ?>

        </table>
    </div>
    </div>
                

</div>
                
                

    
    <br>
    <a href="javascript: history.go(-1)">Volver</a>
</body>
</html>
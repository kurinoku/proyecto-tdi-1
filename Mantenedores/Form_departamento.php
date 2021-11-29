<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Departamento</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/45eaee4fa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Barra de navegación -->
    <div class="container-fluid">
        <?php
        require('Navbar.html');
        ?>
        <!-- Contenedor del Formulario y la Tabla -->
        <div class="row flex-lg-row">
            <!-- Formulario -->
            <div class="col-lg-6 col-md-12">
                <form action="ingresar_departamento.php" method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para añadir Departamento</legend>
                        <div class="form-group row">
                            <div class="form-group">
                                <label>Codigo del departamento</label>
                                <input type="text" name="Codigo_dep" class="form-control" placeholder="12345" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Id municipalidad</label>
                                <input type="text" name="Id_municipalidad" class="form-control" placeholder="12345" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Rut administrador</label>
                                <input type="text" name="Rut_administrador" class="form-control" placeholder="12345678 (Sin guión)" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Nombre departamento:</label>
                                <input type="text" name="Nombre_dep" class="form-control" placeholder="Departamento las Rosas" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Encargado</label>
                                <input type="text" name="Encargado_departamento" class="form-control" placeholder="Juancho Poblete" required>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Departamento</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            <div class="col-lg-6 col-md-12 ps-1">
                <legend class="text-center pt-3">Registro de los departamentos</legend>
                <table class="table table-striped table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Id municipalidad</th>
                            <th>Rut administrador</th>
                            <th>Nombre departamento</th>
                            <th>Encargado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php
                    $consulta = "SELECT * FROM departamento";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $Codigo = $row['Codigo_dep'];
                        $Id = $row['Id_municipalidad'];
                        $Rut = $row['Rut_administrador'];
                        $Nombre = $row['Nombre_dep'];
                        $Encargado = $row['Encargado_departamento'];
                        echo "<tr>";
                        echo "<td>" . $Codigo . "</td>";
                        echo "<td>" . $Id . "</td>";
                        echo "<td>" . $Rut . "</td>";
                        echo "<td>" . $Nombre . "</td>";
                        echo "<td>" . $Encargado . "</td>";
                        echo "<td><a href='eliminar_departamento.php?seleccionado=" . $Codigo . "'>Eliminar</a> <a href='editar_departamento.php?seleccionado=" . $Codigo . "'>Editar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require('Footer.html');
    ?>
</body>

</html>
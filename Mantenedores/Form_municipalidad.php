<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Municipalidad</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/45eaee4fa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación -->
        <?php
        require('Navbar_administrador.html');
        ?>
        <!-- Contenedor del Formulario y la Tabla -->
        <div class="row flex-lg-row">
            <!-- Formulario -->
            <div class="col-lg-6 col-md-12">
                <form action="ingresar_municipalidad.php" method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para añadir Municipalidad</legend>
                        <div class="form-group row">
                            <div class="form-group">
                                <label>Id municipalidad</label>
                                <input type="text" name="Id_municipalidad" class="form-control" placeholder="12345" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Nombre municipalidad</label>
                                <input type="text" name="Nombre_municipalidad" class="form-control" placeholder="Municipalidad de Concepción" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Rut Administrador</label>
                                <input type="text" name="Rut_administrador" class="form-control" placeholder="12345678 (Sin guión)" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Direccion municipalidad</label>
                                <input type="text" name="Direccion_municipalidad" class="form-control" placeholder="Pasaje Barros Arana 332" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Numero municipalidad:</label>
                                <input type="text" name="Numero_municipalidad" class="form-control" placeholder="978451232" required>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Municipalidad</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            <div class="col-lg-6 col-md-12 ps-1">
                <legend class="text-center pt-3">Registro de la Municipalidad</legend>
                <table class="table table-striped table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Id municipalidad</th>
                            <th>Nombre municipalidad</th>
                            <th>Rut Administrador</th>
                            <th>Direccion municipalidad</th>
                            <th>Numero municipalidad</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php
                    $consulta = "SELECT * FROM municipalidad";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $id = $row['Id_municipalidad'];
                        $nombre = $row['Nombre_municipalidad'];
                        $Rut = $row['Rut_administrador'];
                        $direccion = $row['Direccion_municipalidad'];
                        $numero = $row['Numero_municipalidad'];
                        echo "<tr>";
                        echo "<td>" . $id . "</td>";
                        echo "<td>" . $nombre . "</td>";
                        echo "<td>" . $Rut . "</td>";
                        echo "<td>" . $direccion . "</td>";
                        echo "<td>" . $numero . "</td>";
                        echo "<td> <a href='editar_municipalidad.php?seleccionado=" . $id . "'>Editar</a></td>";
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
<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de la Solicitud</title>
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
        require('Navbar.html');
        ?>
        <!-- Contenedor del Formulario y la Tabla -->
        <div class="row flex-lg-row">
            <!-- Formulario -->
            <div class="col-lg-6 col-md-12">
                <form action="ingresar_solicitud.php" method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para añadir Solicitud</legend>
                        <div class="form-group row">
                            <div class="form-group">
                                <label>Codigo departamento</label>
                                <input type="text" name="Codigo_dep" class="form-control" placeholder="12345" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Rut persona</label>
                                <input type="text" name="Rut_persona" class="form-control" placeholder="11111111" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Tipo retroalimentacion:</label>
                                <input type="text" name="Tipo_retroalimentacion" class="form-control" placeholder="Felicitación" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Descripcion</label>
                                <textarea type="text" name="Descripcion" class="form-control" placeholder="Muy buena atención..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Estado</label>
                                <input type="text" name="Estado_msg" class="form-control" placeholder="Pendiente de revisión" required>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Solicitud</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            <div class="col-lg-6 col-md-12 ps-1">
                <legend class="text-center pt-3">Registro de las Solicitudes</legend>
                <table class="table table-striped table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Codigo departamento</th>
                            <th>Rut persona</th>
                            <th>Tipo retroalimentacion</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php
                    $consulta = "SELECT * FROM solicitud";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $Cod = $row['Codigo'];
                        $Codigo = $row['Codigo_dep'];
                        $Rut = $row['Rut_persona'];
                        $Tipo = $row['Tipo_retroalimentacion'];
                        $Descripcion = $row['Descripcion'];
                        $Estado = $row['Estado_msg'];
                        echo "<tr>";
                        echo "<td>" . $Cod . "</td>";
                        echo "<td>" . $Codigo . "</td>";
                        echo "<td>" . $Rut . "</td>";
                        echo "<td>" . $Tipo . "</td>";
                        echo "<td>" . $Descripcion . "</td>";
                        echo "<td>" . $Estado . "</td>";
                        echo "<td><a href='editar_solicitud.php?seleccionado=" . $Cod . "'>Editar</a></td>";
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
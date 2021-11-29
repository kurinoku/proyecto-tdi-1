<?php
require('conexion_p.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Administrador</title>
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
                <form action="ingresar_administrador.php" method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para añadir Administrador</legend>
                        <div class="form-group row">
                            <div class="form-group">
                                <label>RUT</label>
                                <input type="text" name="Rut_administrador" class="form-control" placeholder="12345678 (Sin guión)" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Nombre</label>
                                <input type="text" name="Nombre_administrador" class="form-control" placeholder="Nombre completo" required>
                            </div>
                            <div class="form-group mt-2">
                                <label>Número de celular</label>
                                <input type="text" name="Numero_administrador" class="form-control" placeholder="991738264" required>
                                <small class="form-text text-muted">Utiliza un número de celular que ocupes de manera recurrente.</small>
                            </div>
                            <div class="form-group mt-2">
                                <label>E-mail</label>
                                <input type="email" name="Correo_trabajo" class="form-control" placeholder="alguien@example.com" required>
                                <small class="form-text text-muted">Utiliza un correo principal y no lo compartas con nadie.</small>
                            </div>
                            <div class="form-group mt-2">
                                <label>Contraseña</label>
                                <input type="password" name="Clave_ingreso" class="form-control" placeholder="********" required>
                                <small class="form-text text-muted">Utiliza contraseña segura entre 8 y 16 caracteres.</small>
                            </div>
                    </fieldset>
                    <div class="text-center pb-1">
                        <button type="submit" class="btn btn-primary mt-2">Registrar Administrador</button>
                    </div>
                </form>
            </div>
            <!-- Tabla -->
            <div class="col-lg-6 col-md-12 ps-1">
                <legend class="text-center pt-3">Registro de los administradores</legend>
                <table class="table table-striped table-hover">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>N° Celular</th>
                            <th>E-mail</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <?php
                    $consulta = "SELECT * FROM administrador";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $Rut = $row['Rut_administrador'];
                        $Nombre = $row['Nombre_administrador'];
                        $Numero = $row['Numero_administrador'];
                        $Correo = $row['Correo_trabajo'];
                        $Clave = $row['Clave_ingreso'];

                        echo "<tr>";
                        echo "<td>" . $Rut . "</td>";
                        echo "<td>" . $Nombre . "</td>";
                        echo "<td>" . $Numero . "</td>";
                        echo "<td>" . $Correo . "</td>";
                        echo "<td><a href='eliminar_administrador.php?seleccionado=" . $Rut . "'>Eliminar</a> <a href='editar_administrador.php?seleccionado=" . $Rut . "'>Editar</a></td>";
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
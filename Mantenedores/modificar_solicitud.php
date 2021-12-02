<?php
require('conexion_p.php');
require('../auth_encargado.php');
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
        <?php
        require('navbar_encargado.html');
        $user = $_SESSION['usuario'];
                $consulta = "SELECT * FROM departamento WHERE Rut_encargado = '$user'";
                $resultado = mysqli_query($conexion, $consulta);
                $row = mysqli_fetch_assoc($resultado);
                $cod = $row['Codigo_dep'];  
        ?>
        <div class="row">       
            <div>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
                        <div class="table-responsive">
                                <div class="col-lg-12 col-md-12 ps-1">
                                    <legend class="text-center pt-3">Tabla de Solicitudes</legend>
                                    <table class="table table-striped table-hover">
                                        <thead class="bg-dark text-light">
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Codigo departamento</th>
                                                <th>Rut persona</th>
                                                <th>Tipo retroalimentacion</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Fecha</th>
                                                <th>Opciones</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $consulta = "SELECT * FROM solicitud WHERE Codigo_dep = '$cod'";
                                        $resultado = mysqli_query($conexion, $consulta);
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $Cod = $row['Codigo_solicitud'];
                                            $Codigo = $row['Codigo_dep'];
                                            $Rut = $row['Rut_persona'];
                                            $Tipo = $row['Tipo_solicitud'];
                                            $Descripcion = $row['Descripcion_solicitud'];
                                            $Estado = $row['Estado_solicitud'];
                                            $Fecha = $row['Creada_solicitud'];
                                            echo "<tr>";
                                            echo "<td>" . $Cod . "</td>";
                                            echo "<td>" . $Codigo . "</td>";
                                            echo "<td>" . $Rut . "</td>";
                                            echo "<td>" . $Tipo . "</td>";
                                            echo "<td>" . $Descripcion . "</td>";
                                            echo "<td>" . $Estado . "</td>";
                                            echo "<td>" . $Fecha . "</td>";
                                            echo "<td> <a href='#'>Editar</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                        </div>
                </main>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require('Footer.html');
    ?>
</body>

</html>
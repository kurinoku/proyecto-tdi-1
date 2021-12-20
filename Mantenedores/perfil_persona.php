<?php
require_once "_init.php";
authUser('persona');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Perfil</title>
    <?php
    bootstrapHead();
    echoCSSLink("css/perfil_persona.css");
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php
        require "navbar_persona.php";
        require('conexion_p.php');

        $user = $_SESSION['usuario'];
        $consulta = "SELECT * FROM persona WHERE Rut_persona = '$user'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row['Rut_persona'];
        $municipalidad = $row['Id_municipalidad'];
        $nombre = $row['Nombre_persona'];
        $numero = $row['Numero_persona'];
        $correo = $row['Correo_persona'];
        $clave = $row['Clave_persona'];

        $consulta2 = "SELECT Nombre_municipalidad FROM municipalidad WHERE Id_municipalidad = '$municipalidad'";
        $resultado2 = mysqli_query($conexion, $consulta2);
        $row = mysqli_fetch_assoc($resultado2);
        $muni = $row['Nombre_municipalidad'];

        ?>
        <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
            <div class="card p-4 bg-white">
                <div class=" image d-flex flex-column justify-content-center align-items-center">
                    <img class="rounded-circle" src="https://thumbs.dreamstime.com/b/omita-el-icono-del-perfil-avatar-placeholder-gris-de-la-foto-99724602.jpg" height="150" width="150" />
                    <p class="lead mt-3">
                        <strong>
                            <?php echo $nombre ?>
                        </strong>
                    </p>
                    <p class="lead">
                        <strong>
                            <?php echo $rut ?>
                        </strong>
                    </p>
                    <div class="text mt-3">
                        <p class="lead">Correo: <?php echo $correo ?></p>
                        <p class="lead">Numero: <?php echo $numero ?></p>
                        <p class="lead">Municipalidad: <?php echo $muni ?></p>
                    </div>
                    <a href=<?php echoRutaComillas("Mantenedores/editar_perfil.php"); ?> class="link">
                        <div class=" d-flex mt-2"> <button class="btn btn-dark ">Editar perfil</button> </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    bootstrapBody();
    kitFontBody();
    require('Footer.html');
    ?>
</body>

</html>
<?php
date_default_timezone_set("America/Santiago");
include 'conexion_p.php';

$email = $_POST['email'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];

$correcto = 0;

$consulta = "SELECT * FROM restablecer_contrasenas WHERE email='$email' AND token='$token' AND codigo=$codigo";

$resultado = $conexion->query($consulta) or die($conexion->error);

if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_row($resultado);
    $fecha = $fila[4];
    $fecha_actual = date("Y-m-d H:i:s", time());
    $seconds = strtotime($fecha_actual) - strtotime($fecha);
    $minutos = $seconds / 60;
    if ($minutos > 30) {
        $correcto = 3;
        $consulta3 = "DELETE FROM restablecer_contrasenas WHERE '$email'=email AND '$token'=token";
        $conexion->query($consulta3) or die($conexion->error);
        header("Location: form_codigo_email.php?email=$email&token=$token&correcto=$correcto");
    } else ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php
    require_once "_init.php";
    ?>

    <head>
        <link rel="shortcut icon" href="../img/municipalidad1.png" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperar contraseña</title>
        <!-- Links -->
        <?php
        bootstrapHead();
        ?>
        <!-- Diseños -->
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container-fluid">
            <!-- Barra de navegación primaria-->
            <?php require "../navbar_index_1.php" ?>
        </div>
        <div class="container w-25 mt-5">
            <form action="cambiar_contrasena.php" method="POST">
                <label class="form-label">Nueva contraseña: </label>
                <div class="btn-group mb-2 w-100" role="group" aria-label="Basic example">
                    <input type="text" class="form-control" name="email" maxlength="30" minlength="10" value="<?php echo $email ?>" hidden>
                    <input type="password" class="form-control" name="password" id="password" maxlength="16" minlength="8" required>
                    <button class="btn btn-primary" type="button" onclick="mostrarContrasena()">Mostrar</button>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Restablecer</button>
                </div>
            </form>
        </div>
        <!-- Footer -->
        <?php
        bootstrapBody();
        kitFontBody();
        require('Footer.html');
        ?>
        <script>
            function mostrarContrasena() {
                var tipo = document.getElementById("password");
                if (tipo.type == "password") {
                    tipo.type = "text";
                } else {
                    tipo.type = "password";
                }
            }
        </script>
    </body>

    </html>
<?php
} else {
    $correcto = 0;
    header("Location: form_codigo_email.php?email=$email&token=$token&correcto=$correcto");
} ?>
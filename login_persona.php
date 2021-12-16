<?php
require_once "_init.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <?php
    bootstrapHead();
    ?>
    
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black d-block">
                    <div class="row mt-3">
                        <a class="link-secondary" href=<?php echoRutaComillas("index.php"); ?>>Volver a pagina principal</a>
                    </div>
                    <div class="px-5 ms-xl-4 text-center pt-4">
                        <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                        <img src=<?php echoRutaComillas("img/municipalidad.png"); ?> alt="" class="w-25">
                        <span class="h1 fw-bold mb-0 d-block mt-3">Municipalidad de Concepción</span>
                    </div>
                    <div class="ps-5 pe-5">
                        <?php
                        require('Mantenedores/conexion_p.php');
                        /*
                        Redireccionar si ya esta logueado
                        de otra manera muestra el formulario de login
                        */
                        session_start();
                        if (isset($_SESSION['usuario'])) {
                            $tipo = $_SESSION['tipo'];
                            if (strcmp($tipo, 'admin') == 0) {
                                sendLocationHeader("Mantenedores/perfil_administrador.php");
                            } elseif (strcmp($tipo, 'persona') == 0) {
                                sendLocationHeader("Mantenedores/perfil_persona.php");
                            } elseif (strcmp($tipo, 'encargado') == 0) {
                                sendLocationHeader("Mantenedores/perfil_encargado.php");
                            }
                        } else {
                        ?>
                            <form class="mx-auto mt-5 form-signin needs-validation" method="POST" action=<?php echoRutaComillas("login.php"); ?> novalidate>
                                <h5 class="fw-normal">RUT: </h5>
                                <input id="usuarioInput" type="text" maxlength="8" minlength="7" placeholder="123456789" name="usuario" class="form-control" required autofocus />
                                <div class="invalid-feedback mt-2 mb-2">
                                    Sin puntos y sin número verificador
                                </div>
                                <h5 class="fw-normal mt-3">Contraseña: </h5>
                                <input id="claveInput" type="password" maxlength="14" minlength="8" placeholder="12345678" name="clave" class="form-control" required autofocus />
                                <div class="invalid-feedback">Entre 8 y 14 carácteres; solo se acepta de la A a la Z (mayúscula y minúscula) y números</div>
                                <div class="text-center gap-2">
                                    <button class="btn btn-info btn-lg btn-block mt-3" type="submit">Iniciar sesión</button>
                                    <div class="text-danger mt-2 d-none" id="wrong-cred">
                                        Usuario o clave incorrecta
                                    </div>
                                </div>
                                <p class="mt-4">¿No tienes una cuenta? <a href=<?php echoRutaComillas("Mantenedores/Registro_persona.php"); ?> class="link-info">¡Registrate aquí!</a></p>
                                <div class="text-muted mt-2 d-none" id="no-connect">
                                    No se pudo conectar
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="https://cdn.pixabay.com/photo/2021/11/11/10/47/architecture-6785972_960_720.jpg" alt="Login image" class="w-100 vh-100">
                </div>
            </div>
        </div>
    </section>
    <?php
    bootstrapBody();
    echoScript("login.js");
    ?>
</body>

</html>
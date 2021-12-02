<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Login ciudadano</title>
</head>
<body class="text-center">
    
    <div class="container">
        <div class="row"><a href="index.php">&lt;&lt; Volver a pagina principal</a></div>
        <div class="row">
            <?php
            require('Mantenedores/conexion_p.php');
            /*
                Redireccionar si ya esta logueado
                de otra manera muestra el formulario de login
            */
            session_start();
            if (isset($_SESSION['usuario'])){
                $tipo = $_SESSION['tipo'];

                if (strcmp($tipo, 'admin') == 0) {
                    header("Location: Mantenedores/index_administrador.php");
                } elseif (strcmp($tipo, 'persona') == 0) {
                    header("Location: Mantenedores/perfil_persona.php");
                } elseif (strcmp($tipo, 'encargado') == 0) {
                    header("Location: Mantenedores/index_encargado.php");
                }

            }else{
                ?>
                <form method="POST" action="login.php" class="form-signin needs-validation" novalidate>
                    <h1 class="h3 mb-3 font-weight-normal">Identificación</h1>
                    <div class='position-relative'>
                        <input id="usuarioInput" type="text" maxlength="8" minlength="7" placeholder="Rut: XX XXX XX" name="usuario"  class="form-control" required autofocus>
                        <div class="invalid-feedback mt-2 mb-2">
                            Sin puntos y sin número verificador
                        </div>
                    </div>
                    <div class='position-relative'>
                        <input id="claveInput" type="password" maxlength="14" minlength="8" placeholder="Contraseña" name="clave" class="form-control" required autofocus>
                        <div class="invalid-feedback">Entre 8 y 14 carácteres; solo se acepta de la A a la Z (mayúscula y minúscula) y números</div>
                    </div>
                    <div class="text-muted mt-2 d-none" id="no-connect">
                        No se pudo conectar
                    </div>
                    <div class="text-danger mt-2 d-none" id="wrong-cred">
                        Usuario o clave incorrecta
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
                    </div>
                    <div class="mt-3">
                        <a href="Mantenedores/Registro_persona.php">Registrate</a>
                    </div>
            
                </form>
                <?php
            }
            ?>    

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="login.js"></script>
</body>
</html>
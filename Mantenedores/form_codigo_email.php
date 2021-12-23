<?php
if (isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];
    
}

if(isset($_GET['correcto'])){
    $correcto = $_GET['correcto'];
    $alerta = "";
}
?>

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
    <title>Ingresar código</title>
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
        <form action="verificar_token_codigo_email.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="email" maxlength="30" minlength="10" value="<?php echo $email ?>" hidden>
                <input type="text" class="form-control" name="token" maxlength="30" minlength="10" value="<?php echo $token ?>" hidden>
                <label class="form-label">Código</label>
                <input type="number" class="form-control" name="codigo" maxlength="4" minlength="4">
            </div>
            <?php
            if (isset($correcto)) {
                if ($correcto == 0) {
                    $alerta = "Codigo incorrecto.";
                    echo  "<div class='alert alert-danger' role='alert'>$alerta</div>";
                } else if($correcto == 3){
                    $alerta = "Codigo expirado, por favor, reingrese una nueva solicitud de restablecimiento.";
                    echo  "<div class='alert alert-danger' role='alert'>$alerta</div>";
                }
            }
            ?>
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
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
require_once "_init.php";

if(!empty($_GET)){
    $existe = $_GET['existe'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <form action="restablecer_contrasena.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Dirección e-mail</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" maxlength="30" minlength="10" required>
                <div id="emailHelp" class="form-text">Ingresa el correo con el que te registraste para restablecer la contraseña.</div>
                <?php 
                $alerta = "";
                if(isset($existe)){
                    if($existe==1){
                        $alerta = "Se envió con éxito";
                        echo  "<div class='alert alert-success' role='alert'>$alerta</div>";
                    } else if($existe==0){
                        $alerta = "Correo no existente";
                        echo  "<div class='alert alert-danger' role='alert'>$alerta</div>";
                    }
                }
                ?>
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
</body>

</html>
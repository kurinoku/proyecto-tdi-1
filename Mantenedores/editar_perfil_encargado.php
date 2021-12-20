<?php
require_once "_init.php";
authUser('encargado');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="shortcut icon" href="../img/municipalidad1.png" />
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <?php
    bootstrapHead();
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php
        require "navbar_encargado.php";
        require('conexion_p.php');
        $user = $_SESSION['usuario'];
        $consulta = "SELECT * FROM encargado WHERE Rut_encargado = '$user'";
        $resultado = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_assoc($resultado);
        $rut = $row['Rut_encargado'];
        $nombre = $row['Nombre_encargado'];
        $numero = $row['Numero_encargado'];
        $correo = $row['Correo_encargado'];
        ?>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-5 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" src="https://thumbs.dreamstime.com/b/omita-el-icono-del-perfil-avatar-placeholder-gris-de-la-foto-99724602.jpg">
                        <span class="font-weight-bold"><?php echo $nombre ?></span>
                        <span class="text-black-50"><?php echo $rut ?></span>
                        <span> </span>
                    </div>
                </div>
                <div class="col-md-7 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Datos de cuenta</h4>
                        </div>
                        <form action=<?php echoRutaComillas("Mantenedores/actualizar_perfil_encargado.php"); ?> method="post">
                            <div class="row mt-2">
                                <div class="col-md-12 mb-3"><label class="labels">Nombre</label>
                                    <input name="Nombre_encargado" maxlength="40" type="text" class="form-control" placeholder="<?php echo $nombre ?>" value="">
                                    <div class="invalid-feedback">El nombre ingresado no es válido</div>
                                </div>
                                <div class="col-md-12 mb-3"><label class="labels">Numero de contacto</label>
                                    <input name="Numero_encargado" maxlength="9" type="text" class="form-control" placeholder="<?php echo $numero ?>" value="">
                                    <div class="invalid-feedback">El número ingresado no es válido</div>
                                </div>
                                <div class="col-md-12 mb-3"><label class="labels">Correo</label>
                                    <input name="Correo_encargado" type="email" class="form-control" placeholder="<?php echo $correo ?>" value="">
                                    <div class="invalid-feedback">El correo ingresado no es válido</div>
                                </div>
                                <div class="col-md-12 mb-3"><label class="labels">Clave de ingreso</label>
                                    <input maxlength="14" name="Clave_encargado" type="password" class="form-control" placeholder="*****" value="">
                                    <div class="invalid-feedback">La contraseña debe contener entre 8 y 14 carácteres; Debe incluir al menos una mayúscula, una minúscula y un número</div>
                                </div>
                            </div>
                            <div class="mt-2 text-center"><button class="btn btn-dark profile-button" type="submit">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    kitFontBody();
    require('Footer.html');
    ?>
</body>
<?php
bootstrapBody();
echoScript("util/util.js");
echoScript("Mantenedores/validacion.js");
?>
<script>
    let valida = new ValidaPaginas();
    valida.magia();
</script>

</html>
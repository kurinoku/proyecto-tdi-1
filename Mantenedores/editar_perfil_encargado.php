<?php require('../auth_encargado.php') ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editar_perfil.css">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <?php
        require('navbar_encargado.html');
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

                        <form action="actualizar_perfil_encargado.php" method="post">
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Nombre</label><input name="Nombre_encargado" maxlength="40" type="text" class="form-control" placeholder="<?php echo $nombre ?>" value="">
                                    <div class="invalid-feedback">El nombre ingresado no es válido</div>
                                </div>
                                <div class="col-md-12"><label class="labels">Numero de contacto</label><input name="Numero_encargado" maxlength="9" type="text" class="form-control" placeholder="<?php echo $numero ?>" value="">
                                    <div class="invalid-feedback">El número ingresado no es válido</div>
                                </div>
                                <div class="col-md-12"><label class="labels">Correo</label><input name="Correo_encargado" type="email" class="form-control" placeholder="<?php echo $correo ?>" value="">
                                    <div class="invalid-feedback">El correo ingresado no es válido</div>
                                </div>
                                    <div class="col-md-12"><label class="labels">Clave de ingreso</label><input maxlength="14" name="Clave_encargado" type="password" class="form-control" placeholder="*****" value="">
                                    <div class="invalid-feedback">La contraseña debe contener entre 8 y 14 carácteres; Debe incluir al menos una mayúscula, una minúscula y un número</div></div>
                                </div>
                                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<script src="../util/util.js"></script>
<script src="validacion.js"></script>
<script>
    let valida = new ValidaPaginas();
    valida.magia();
</script>
</html>
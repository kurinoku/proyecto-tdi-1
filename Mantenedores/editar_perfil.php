<?php require('../auth_usuario.php') ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editar_perfil.css">
</head>
<body>
<?php 
    require('navbar_persona.html');
    require('conexion_p.php'); 

    $user = $_SESSION['usuario'];
    $consulta = "SELECT * FROM ciudadano WHERE Rut_persona = '$user'";
    $resultado = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_assoc($resultado);
    $rut = $row['Rut_persona'];
    $municipalidad = $row['Id_municipalidad'];
    $nombre = $row['Nombre_persona'];
    $numero = $row['Numero_persona'];
    $correo = $row['Correo_persona'];
    $clave = $row['Clave_persona'];
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

                <form action="actualizar_perfil.php" method="post">
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Nombre</label><input name="nombre" type="text" class="form-control" placeholder="<?php echo $nombre ?>" value=""></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Numero de contacto</label><input name="numero" type="text" class="form-control" placeholder="<?php echo $numero ?>" value=""></div>
                        <div class="col-md-12"><label class="labels">Correo</label><input name="correo" type="text" class="form-control" placeholder="<?php echo $correo ?>" value=""></div>
                        <div class="col-md-12"><label class="labels">Rut</label><input name="rut" type="text" class="form-control" placeholder="<?php echo $rut ?>" value=""></div>
                        <div class="col-md-12"><label class="labels">Clave de ingreso</label><input name="clave" type="password" class="form-control" placeholder="*****" value=""></div>
                    </div>
                    
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>

            </div>
        </div>

    </div>
</div>


</body>
</html>
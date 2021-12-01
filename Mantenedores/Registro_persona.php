
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Registrar_persona.css">
</head>
<body>

<div class="container  mt-4 mb-4">
    <div class="row">
    <div class="col-lg-3"></div>
        <div class="col-lg-6 col-md-6 col-sm-12 rounded bg-white">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="../login_persona.php"><button type="button" class="btn btn-secondary">Volver</button></a>
                    
                    <h4 class="text-right">Datos de cuenta</h4>
                </div>

                <form action="ingresar_persona.php" method="post">
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Nombre</label><input name="Nombre_persona" type="text" class="form-control" placeholder="Pablo" value="" required></div>
                        <div class="col-md-12"><label class="labels">Rut</label><input name="Rut_persona" type="text" class="form-control" placeholder="11222333" value="" required></div>
                        <div class="col-md-12"><label class="labels">Numero de contacto</label><input name="Numero_persona" type="text" class="form-control" placeholder="123456789" value=""></div>
                        <div class="col-md-12"><label class="labels">Correo</label><input name="Correo_persona" type="text" class="form-control" placeholder="abc@gmail.com" value=""></div>
                        <div class="col-md-12"><label class="labels">Clave de ingreso</label><input name="Clave_persona" type="password" class="form-control" placeholder="*****" value="" required></div> 
                        <div class="form-group">
                            <label class="labels" for="Id_municipalidad">municipalidad:</label>
                            <select name="Id_municipalidad" class="form-select" aria-label="Default select example" required>
                                <option value="" disabled selected>Selecciona la municipalidad</option>
                                <?php
                                require('conexion_p.php'); 
                                $consulta = "SELECT * FROM municipalidad";
                                $resultado = mysqli_query($conexion, $consulta);
                                while($row = mysqli_fetch_assoc($resultado)){
                                    $nombremuni = $row['Nombre_municipalidad'];
                                    $codigomuni = $row['Id_municipalidad'];
                                    ?>
                                    <option value="<?php echo $codigomuni?>"><?php echo $nombremuni?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                    </div>                                      
                    
                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>
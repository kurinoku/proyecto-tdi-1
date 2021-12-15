<?php
require('conexion_p.php');
require('../auth_encargado.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php require('navbar_encargado.html');?>    

    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h1 fw-light">Nueva noticia</div>
                            <p class="mb-4 text-muted">Ingresa los datos en este formulario para poder crear la noticia</p>
                        </div>

                        <form action="ingresar_noticia.php" method="post">
                            <!-- Titulo -->
                            <div class="form-floating mb-3">
                            <input class="form-control" name="Titulo" type="text" placeholder="Titulo de la noticia" />
                            <label for="Titulo">Titulo de la noticia</label>
                            </div>

                            <!-- Foto portada -->
                            <div class="form-floating mb-3">
                            <input class="form-control" name="Foto1" type="text" placeholder="Nombre de la imagen" />
                            <label for="Foto1">Nombre de la imagen</label>
                            </div>

                            <!-- Cuerpo noticia -->
                            <div class="form-floating mb-3">
                            <textarea class="form-control" name="Cuerpo" type="text" placeholder="Cuerpo de la noticia" style="height: 10rem;" ></textarea>
                            <label for="Cuerpo">Cuerpo de la noticia</label>        
                            </div>

                            <!-- Foto secundaria -->
                            <div class="form-floating mb-3">
                            <input class="form-control" name="Foto2" type="text" placeholder="Nombre de la imagen" />
                            <label for="Foto2">Nombre de la imagen</label>
                            </div>

                            <!-- Boton -->
                            <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Crear</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
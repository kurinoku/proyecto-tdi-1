<?php require('../auth_admin.php') ?>

<!DOCTYPE html>
<html lang="en">
<!--
FIX TEMPORAL
deberia estar en root, pero para que el navbar funcione 
debe estar en la misma carpeta que mantenedores
-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/site.css">
    
    <title>Municipalidad</title>
</head>
<body>
    <div class="row flex-nowrap justify-content-between p-5">
        <h1 class="col me-auto d-inline-block">Municipalidad</h1>

        <!--<div class="user-modal col p-4" id="user-modal">
            <button type="button" class="btn btn-primary dropdown-toggle" 
            aria-expanded="false" data-bs-toggle="dropdown">
            mostrar</button>
            <div class="dropdown-menu" id="collapse-user-modal">
                <img src="usuario.svg" class="" alt="" srcset="">
            </div>
        </div> -->
        <button type="button" class="col btn btn-primary" disabled>Log out</button>
    </div>
    <?php require "Navbar.html" ; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
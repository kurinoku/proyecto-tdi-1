<?php 
require_once "_init.php";
authUser('persona');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Municipalidad</title>
    <?php
    bootstrapHead();
    ?>
</head>
<body class="d-flex flex-column min-vh-100">
<div class="container-fluid">
    <?php require "navbar_persona.php"; ?>
</div> 
</body>
<?php
bootstrapBody();
?>

</html>
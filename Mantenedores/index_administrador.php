<?php 
require_once "_init.php";
authUser('admin');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    bootstrapHead();
    echoCSSLink("css/site.css");
    ?>
    <title>Municipalidad</title>
</head>

<body class="d-flex flex-column min-vh-100">
<div class="container-fluid">
    <?php 
        require_once "Navbar_administrador.php"; 
    ?>
</div>
<?php
bootstrapBody();
?>
</body>

</html>
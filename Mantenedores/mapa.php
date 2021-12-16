<?php
require_once "_init.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Municipalidad de Concepción</title>
    <!-- Links -->
    <?php
    bootstrapHead();
    ?>
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        
        <?php require __DIR__ . "/../navbar_index_1.php" ?>
        <?php require __DIR__ . "/../navbar_index_2.php" ?>
        
        <div class="container-fluid">
            <div class="row mt-3">
                <h2 class="text-black text-center">Municipalidad de Concepción</h2>
                <h4 class="text-black text-center">Calle Bernardo O`Higgins 525</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.595571121248!2d-73.05365328475148!3d-36.82821007994284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9669b5d096e6054b%3A0x970b5f81f9f4831d!2sMunicipality%20of%20Concepci%C3%B3n!5e0!3m2!1sen!2scl!4v1639175670452!5m2!1sen!2scl"
                    width="600" height="450" style="padding:30px;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
        <hr>
    </div>
    <!-- Footer -->
    <?php
    require('Footer.html');

    bootstrapBody();
    kitFontBody();
    ?>
</body>

</html>


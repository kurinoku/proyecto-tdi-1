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
        <!-- Barra de navegación primaria-->
        <nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href=<?php echoRutaComillas("index.php"); ?>>Municipalidad de Concepción</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TipoLogin">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="TipoLogin" class="collapse navbar-collapse">
                        <button type="button" class="btn btn-secondary bg-dark ms-auto" onclick=<?php echo "\"location.href='" . buildRuta("login_persona.php") . "'\""; ?>>
                            <?php session_start();if (isset($_SESSION['tipo'])){
                                echo "Ir a cuenta";
                                }else{
                                    echo "Iniciar Sesión";
                                }
                            ?>
                        </button>
                </div>
            </div>
        </nav>
        <!-- Barra de navegación secundaria -->
        <nav class="row navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Seccion"
                        aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="Seccion">
                        <ul class="navbar-nav me-auto mx-auto">
                            <div class="col">
                                <!-- Botón de Inicio -->
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">Inicio</a>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de despliegue sección de Municipalidad -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle ms-5" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">Municipalidad</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Direcciones Municipales</a>
                                        <a class="dropdown-item" href="#">Concejo Municipal</a>
                                        <a class="dropdown-item" href="#">Juzgados de Policía Local</a>
                                        <a class="dropdown-item" href="#">Misión y Visión</a>
                                        <a class="dropdown-item" href="#">Palabras del Alcalde</a>
                                        <a class="dropdown-item" href="#">Himno</a>
                                        <a class="dropdown-item" href="#">Participación Ciudadana</a>
                                        <a class="dropdown-item" href="#">Plan Regulador</a>
                                    </div>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de despliegue sección de Tramites -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle ms-5" data-bs-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">Trámites</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">En Linea</a>
                                        <a class="dropdown-item" href="#">Oficina de Partes</a>
                                        <a class="dropdown-item" href="#">Trámites Jurídicos</a>
                                        <a class="dropdown-item" href="#">Consulta de Documentos electrónicos</a>
                                        <a class="dropdown-item" href="#">Actos y resoluciones con efectos sobre
                                            terceras personas</a>
                                        <a class="dropdown-item" href="#">Formularios</a>
                                        <a class="dropdown-item" href="#">Otros Servicios</a>
                                    </div>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de Servicios -->
                                <li class="nav-item">
                                    <a class="nav-link active ms-5" href="#">Servicios</a>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de Fotos -->
                                <li class="nav-item">
                                    <a class="nav-link active ms-5" href="#">Fotos</a>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de Noticias -->
                                <li class="nav-item">
                                    <a class="nav-link active ms-5" href="#">Noticias</a>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de Ubicación -->
                                <li class="nav-item">
                                    <a class="nav-link active ms-5" href=<? echoRutaComillas("Mantenedores/mapa.php") ?>>Ubicación</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
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


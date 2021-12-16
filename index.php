<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Municipalidad de Concepción</title>
    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/45eaee4fa2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Diseños -->
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid">
        <!-- Barra de navegación primaria-->
        <nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand ms-5" href="index.php">Municipalidad de Concepción</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TipoLogin">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="TipoLogin" class="collapse navbar-collapse">
                        <button type="button" class="btn btn-secondary bg-dark ms-auto"onclick="location.href='login_persona.php'">
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
                                    <a class="nav-link active ms-5" href="Mantenedores/mostrar_noticia.php">Noticias</a>
                                </li>
                            </div>
                            <div class="col">
                                <!-- Botón de Ubicación -->
                                <li class="nav-item">
                                    <a class="nav-link active ms-5" href="Mantenedores/mapa.php">Ubicación</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/mision-cumplida.png" alt="Generic placeholder image"
                            width="140" height="140">
                        <h2>Misión</h2>
                    </div class="text-center">
                    <p>Como municipalidad buscamos trabajar arduamente para satisfacer, por medio de sus servicios y
                        equipo, a las personas usuarias
                        de la entidad y quienes se vinculan con la comuna. Adaptando, fortaleciendo y mejorando su
                        gestión de acuerdo a las necesidades y contingencia, considerando la inclusión, la perspectiva
                        de
                        género y la sostenibilidad en sus labores cotidianas. </p>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/vision-compartida.png" alt="Generic placeholder image"
                            width="140" height="140">
                        <h2>Visión</h2>
                    </div class="text-center">
                    <p>Ser un municipio líder, innovador e impulsor del desarrollo sostenible e inclusivo, promotor del
                        enfoque de género y la participación ciudadana, centrado en el bienestar, diversidad y dignidad
                        de
                        las personas de la comuna de "XXXXXX".</p>
                </div>
                <div class="col-4">
                    <div class="text-center">
                        <img class="rounded" src="img/municipalidad.png" alt="Generic placeholder image" width="140"
                            height="140">
                        <h2>Valores</h2>
                    </div class="text-center">
                    <p>Para el cumplimiento del Plan, la Municipalidad de "XXXXXX" priorizará sus acciones y políticas
                        en
                        áreas enmarcadas y sustentadas en los siguientes principios y valores, que representan el
                        espíritu
                        del municipio y del funcionariado, como por ejemplo: Participación ciudadana , probidad,
                        eficiencia, transparencia y acceso a la información, compromiso, empatía, inclusión.
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5">
            <div class="row mt-4">
                <div class="col-6">
                    <h2 class="text-black text-center">Campañas y Talleres</h2>
                    <div id="CarouselMuni" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#CarouselMuni" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="img/1.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Mayor sustentabilidad ambiental.</h3>
                                    <p>Se realizarán futuras campañas medioambientales de tal manera que se busque
                                        disminuir contaminacion ambiental.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/2.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Curso y actividades de recreación por Bomberos de la zona.</h3>
                                    <p>Los bomberos de la comuna realizarán distintas actividades para ayudar a la
                                        ciudadanía a tomar medidas preventivas en ciertas
                                        situaciones de peligro.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/3.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Cursos y talleres RCP.</h3>
                                    <p>Realización de cursos gratuitos de RCP, para toda la ciudadanía, click para ver
                                        más información.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselMuni"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#CarouselMuni"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <h2 class="text-black text-center">Noticias</h2>
                    <div id="CarouselNoti" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="0" class="active"
                                aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#CarouselNoti" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"><img src="img/4.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Vacunas contra el COVID.</h3>
                                    <p>Arriban más de 10000 vacunas contra el COVID, se busca que éstas se puedan
                                        distribuir en un tiempo de 2 semanas.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/5.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Camillas e implementación para el hospital de la Comuna.</h3>
                                    <p>Se renueva el hospital de la comuna con nueva implementación, en donde se
                                        incluyen camas, toma de temperatura y presión, etc.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <a href="#"><img src="img/6.jpg" class="d-block w-100" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Instauración de nueva escuela.</h3>
                                    <p>Nueva escuela para los niños de la comuna, en donde en un plazo de 1 mes, esta
                                        busca ya estar operativa para la gente de la comuna.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselNoti"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#CarouselNoti"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
    require('Mantenedores/Footer.html');
    ?>
</body>

</html>
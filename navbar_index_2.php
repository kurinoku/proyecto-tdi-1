<nav class="row navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Seccion" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link active dropdown-toggle ms-5" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Municipalidad</a>
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
                            <a class="nav-link active dropdown-toggle ms-5" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Trámites</a>
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
                            <a class="nav-link active ms-5" href=<?php echoRutaComillas("Mantenedores/mostrar_galeria.php"); ?>>Fotos</a>
                        </li>
                    </div>
                    <div class="col">
                        <!-- Botón de Noticias -->
                        <li class="nav-item">
                            <a class="nav-link active ms-5" href=<?php echoRutaComillas("Mantenedores/mostrar_noticia.php"); ?>>Noticias</a>
                        </li>
                    </div>
                    <div class="col">
                        <!-- Botón de Ubicación -->
                        <li class="nav-item">
                            <a class="nav-link active ms-5" href=<?php echoRutaComillas("Mantenedores/mapa.php"); ?>>Ubicación</a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</nav>
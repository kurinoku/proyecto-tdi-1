<nav class="row navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Seccion" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Seccion">
                <ul class="navbar-nav me-auto mx-auto">
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
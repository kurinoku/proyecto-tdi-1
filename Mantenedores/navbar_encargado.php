<nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href=<?php echoRutaComillas("index.php"); ?>>Municipalidad de Concepción</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#MenuEdicion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="MenuEdicion" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administrar</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href=<?php echoRutaComillas("Mantenedores/perfil_encargado.php"); ?>>Ver perfil</a>
                        <a class="dropdown-item" href=<?php echoRutaComillas("Mantenedores/modificar_solicitud.php"); ?>>Ver solicitudes</a>
                        <a class="dropdown-item" href=<?php echoRutaComillas("Mantenedores/crear_noticia.php"); ?>>Ingresar noticias</a>
                        <a class="dropdown-item" href=<?php echoRutaComillas("Mantenedores/crear_foto.php"); ?>>Ingresar fotos</a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="TipoLogin" class="collapse navbar-collapse">
            <button type="button" class="btn btn-secondary bg-dark ms-auto" onclick=<?php echo "\"location.href='" . buildRuta('logout.php') . "'\""; ?>>Cerrar Sesión</button>
        </div>
    </div>
</nav>
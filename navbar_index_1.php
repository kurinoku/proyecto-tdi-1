<nav class="row navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand ms-5" href=<?php echoRutaComillas("index.php"); ?>>Municipalidad de Concepción</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TipoLogin">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="TipoLogin" class="collapse navbar-collapse">
            <button type="button" class="btn btn-secondary bg-dark ms-auto" onclick=<?php echo "\"location.href='" . buildRuta("login_persona.php") . "'\""; ?>>
                <?php session_start();
                if (isset($_SESSION['tipo'])) {
                    echo "Ir a cuenta";
                } else {
                    echo "Iniciar Sesión";
                }
                ?>
            </button>
        </div>
    </div>
</nav>
<?php

$REL_RUTA = '';
$rutaIsSet = false;

function setRuta($ruta) {
    global $REL_RUTA, $rutaIsSet;

    $REL_RUTA = $ruta;
    $rutaIsSet = true;
}

function raiseIfNotSet() {
    global $rutaIsSet;
    if (!$rutaIsSet) {
        throw new Exception("Ruta is not set");
    }
}

function buildRuta($ruta) {
    global $REL_RUTA;
    raiseIfNotSet();
    if ($REL_RUTA == ".") {
        return $ruta;
    }
    return "$REL_RUTA/$ruta";
}

function echoRuta($ruta) {
    echo buildRuta($ruta);
}

function echoRutaComillas($ruta) {
    echo "\"";
    echoRuta($ruta);
    echo "\"";
}

function echoCSSLink($css) {
    ?>
    <link rel="stylesheet" href=<?php echoRutaComillas($css); ?>>
    <?php
}

function echoScript($link) {
    ?>
    <script src=<?php echoRutaComillas($link); ?>></script>
    <?php
}

function sendLocationHeader($loc) {
    header('Location: ' . buildRuta($loc));
}

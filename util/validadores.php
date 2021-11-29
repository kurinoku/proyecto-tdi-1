<?php

function validarPatron($pat, $entrada) {
    $m = preg_grep($pat, array( $entrada ));
    return !empty($m);
}

function validarRut($rut) {
    return validarPatron('/^[0-9]{1,8}$/u', $rut);
}

function validarNombre($nombre) {
    return validarPatron('/^[a-zA-ZáéíóúÁÉÍÓÚ]{1,40}$/u', $nombre);
}

function validarCorreo($correo) {
    // largo esta sujeto a cambio #42
    // https://github.com/kurinoku/proyecto-tdi-1/issues/42
    $largo = mb_strlen(mb_strlen($correo));
    $reqLargo = $largo >= 3 and $largo <= 20;
    return  $reqLargo and validarPatron('/^[A-Za-z\-_\.]*@[A-Za-z\-_\.]*$/u', $correo);
}

function validarNumero($numero) {
    // > será una cadena de caracteres de largo 9 
    // > y se aceptarán números enteros positivos de hasta 8 dígitos entre el 0 y el 9.
    // TODO ambiguo revisar despues
    return validarPatron('/^[0-9]{1,9}$/u', $numero);
}

function validarClave($clave) {
    $largo = mb_strlen($clave);
    $reqLargo = $largo >= 8 and $largo <= 14;
    $unaMayus = validarPatron('/[A-Z]/u', $clave);
    $unaMinus = validarPatron('/[a-z]/u', $clave);
    $unDigito = validarPatron('/[0-9]/u', $clave);
    $reqMinimo = $unaMayus and $unaMinus and $unDigito;
    return $reqMinimo and $reqLargo and validarPatron('/^[A-Za-z0-9]$/u', $clave);
}

function validarNombreDep($nombre) {
    return validarPatron('/^[a-zA-ZáéíóúÁÉÍÓÚ]{1,50}$/u', $nombre);
}

function validarCodigoDep($codigo) {
    return validarPatron('/^[a-zA-Z0-9]{8}$/u', $codigo);
}

function validarTipoRetroalimentacion($tipo) {
    return strcmp($tipo, 'Felicitaciones') == 0 
            or strcmp($tipo, 'Reclamo') == 0 
            or strcmp($tipo, 'Sugerencia') == 0;
}

function validarDescripcion($desc) {
    return mb_strlen($desc) <= 500 and validarPatron('/^[A-Za-záéíóúÁÉÍÓÚ, \.]+$/u', $desc);
}

function validarCodigo($codigo) { // codigo de retroalimentacion
    return mb_strlen($codigo) <= 10 and validarPatron('/^[0-9]+$/u', $codigo);
}

function validarEstadoMsg($estado) {
    $largo = mb_strlen($estado);
    $reqLargo = $largo >= 1 and $largo <= 15;
    return $reqLargo and validarPatron('/^[A-Za-záéíóúÁÉÍÓÚ]+$/u', $estado);
}


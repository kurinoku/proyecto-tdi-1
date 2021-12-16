<?php
require_once "util/common.php";

function authUser($tipo) {
    session_start();
    if(!isset($_SESSION['tipo']) or $_SESSION['tipo'] != $tipo){
        sendLocationHeader("index.php");
        exit(); 
    }
}

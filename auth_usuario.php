<?php
session_start();
if(!isset($_SESSION['tipo']) or $_SESSION['tipo'] != 'persona'){
    header("Location: ../index.php");
    exit(); 
}

<?php
session_start();
if(!isset($_SESSION['tipo']) or $_SESSION['tipo'] != 'encargado'){
    header("Location: ../index.php");
    exit(); 
}
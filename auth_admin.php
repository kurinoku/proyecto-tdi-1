<?php
session_start();
if(!isset($_SESSION['tipo']) or $_SESSION['tipo'] != 'admin'){
    header("Location: ../index.php");
    exit(); 
}
<?php
@session_start();
include '../models/conexion.php';
include '../models/funciones.php';
include '../controllers/funciones.php';
$user = $_POST['user'];
$passw = $_POST['passw'];
$tabla = "usuarios";
$campo = "usuario";
AccesoLogin($user,$passw,$tabla,$campo);
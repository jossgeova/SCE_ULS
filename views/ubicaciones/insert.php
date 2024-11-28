<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

$ubicacion = $_POST['ubicacion'];
$tabla = "ubicaciones";
$campos = "ubicacion,estado";
$valores = "'$ubicacion',1";
$insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)", "i");
if ($insert) {
    header("Location: principal.php?msj=" . base64_encode("Ubicación registrada....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    header("Location: principal.php?msj=" . base64_encode("Error al registrar ubicación....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
}

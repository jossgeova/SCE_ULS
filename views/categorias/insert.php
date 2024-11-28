<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

$categoria = $_POST['categoria'];
$tabla = "categorias";
$campos = "categoria,estado";
$valores = "'$categoria',1";
$insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)", "i");
if ($insert) {
    header("Location: principal.php?msj=" . base64_encode("Categoría registrada....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    header("Location: principal.php?msj=" . base64_encode("Error al registrar categoría....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
}

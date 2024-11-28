<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';
$idubicacion = $_POST['idubicacion'];
$tabla = "ubicaciones";
$condicion = "idubicacion='$idubicacion'";
$delete = CRUD("DELETE FROM $tabla WHERE $condicion", "d");
if ($delete) {
    header("Location: principal.php?msj=" . base64_encode("Ubicación eliminada....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    header("Location: principal.php?msj=" . base64_encode("Error al eliminar ubicación....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
}

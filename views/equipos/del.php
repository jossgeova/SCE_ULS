<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

$idequipo = $_POST['idequipo'];
$tabla = "equipos";
$condicion = "idequipo='$idequipo'";
$delete = CRUD("DELETE FROM $tabla WHERE $condicion", "d");

if ($delete) {
    header("Location: principal.php?msj=" . base64_encode("Equipo eliminado....."));
    exit();
} else {
    header("Location: principal.php?msj=" . base64_encode("Error al eliminar equipo....."));
    exit();
}
?>

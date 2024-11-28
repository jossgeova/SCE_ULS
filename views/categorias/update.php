<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';


$tabla = "categorias";
$idcategoria = $_POST['idcategoria'];
$categoria = $_POST['categoria'];
$estado = $_POST['estado'];

$campos = "categoria='$categoria',estado='$estado'";
$condicion = "idcategoria='$idcategoria'";

$update = CRUD("UPDATE $tabla SET $campos WHERE $condicion", "u");
if ($update) {
    header("Location: principal.php?msj=" . base64_encode("Categoría actualizada....."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
} else {
    header("Location: formUpdate.php?idcategoria=" . base64_encode($idcategoria) . "&msj=" . base64_encode("Error al actualizar categoría...."));
    // Asegurarse de que no se siga ejecutando el script
    exit();
}

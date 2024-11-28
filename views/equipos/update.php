<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

// Verificar si se recibe el ID del equipo
if (empty($_POST['idequipo'])) {
    echo "Error";
    // Redireccionar con mensaje de error si el ID del equipo no se proporciona
    header("Location: formUpdate.php?idequipo=" . base64_encode($_POST['idequipo'])."&msj=".base64_encode("Error: falta el ID del equipo."));
    exit();
} else {
    $tabla = "equipos";
    $idequipo = $_POST['idequipo'];
    $equipo = $_POST['equipo'];
    $serie = $_POST['serie'];
    $modelo = $_POST['modelo'];
    $idcategoria = $_POST['idcategoria'];
    $idubicacion = $_POST['idubicacion'];
    $estado = $_POST['estado'];
    $idusuario = $_SESSION['idusuario'];

    // Definir los campos a actualizar
    $campos = "equipo='$equipo', serie='$serie', modelo='$modelo', idcategoria='$idcategoria', idubicacion='$idubicacion', estado='$estado', idusuario='$idusuario'";
    $condicion = "idequipo='$idequipo'";

    // Realizar la actualización
    $update = CRUD("UPDATE $tabla SET $campos WHERE $condicion", "u");

    if ($update) {
        // Redirigir a la página principal con un mensaje de éxito
        header("Location: principal.php?msj=" . base64_encode("Equipo actualizado correctamente."));
        exit();
    } else {
        // Redirigir de vuelta al formulario con un mensaje de error
        header("Location: formUpdate.php?idequipo=" . base64_encode($idequipo)."&msj=".base64_encode("Error al actualizar el equipo."));
        exit();
    }
}
?>

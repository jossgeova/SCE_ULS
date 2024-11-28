<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';
/*
if (empty($_POST['equipo']) || empty($_POST['idcategoria']) || empty($_POST['idubicacion'])) {
    header("Location: principal.php?msj=" . base64_encode("Error: Faltan datos obligatorios..."));
    exit();
} else {
*/
    $equipo = $_POST['equipo'];
    $serie = $_POST['serie'];
    $modelo = $_POST['modelo'];
    $idcategoria = $_POST['idcategoria'];
    $idubicacion = $_POST['idubicacion'];
    $estado = 1;  
    $idusuario = $_SESSION['idusuario'];  
    $tabla = "equipos";
    $campos = "equipo, serie, modelo, idcategoria, idubicacion, estado, idusuario";
    $valores = "'$equipo', '$serie', '$modelo', '$idcategoria', '$idubicacion', '$estado', '$idusuario'";
    
    $insert = CRUD("INSERT INTO $tabla($campos) VALUES($valores)", "i");

    if ($insert) {
        header("Location: principal.php?msj=" . base64_encode("Equipo registrado correctamente."));
        exit();
    } else {
        header("Location: principal.php?msj=" . base64_encode("Error al registrar equipo."));
        exit();
    }
//}
?>

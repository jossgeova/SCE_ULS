<?php
@session_start();
if (!isset($_SESSION['login_ok'])) {
    header('Location: ../../index.php');
    exit();
}

include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

// Verificar si se recibe el ID del equipo
if (isset($_POST['idequipo'])) {
    $idequipo = $_POST['idequipo'];
} else {
    $idequipo = base64_decode($_GET['idequipo']);
}

if (isset($_GET['msj'])) {
    $msj = base64_decode($_GET['msj']);
}

// Obtener los datos del equipo
$dataEquipo = CRUD("SELECT * FROM equipos WHERE idequipo='$idequipo'", "s") ?? [];

if (count($dataEquipo) > 0) {
    $result = $dataEquipo[0]; // Tomar el primer resultado
    $equipo = $result['equipo'];
    $serie = $result['serie'];
    $modelo = $result['modelo'];
    $idcategoria = $result['idcategoria'];
    $idubicacion = $result['idubicacion'];
    $estado = $result['estado'];
} else {
    header("Location: principal.php?msj=" . base64_encode("Error: Equipo no encontrado."));
    exit();
}
$categoria = buscavalor("categorias", "categoria", "idcategoria='$idcategoria'");
$ubicacion = buscavalor("ubicaciones", "ubicacion", "idubicacion='$idubicacion'");
// Obtener todas las categorías disponibles para mostrarlas en el select
$categorias = CRUD("SELECT * FROM categorias", "s");
$dataCategorias = CRUD("SELECT * FROM categorias WHERE estado=1 AND idcategoria != '$idcategoria'", "s")?? [];
$dataUbicaciones = CRUD("SELECT * FROM ubicaciones WHERE estado=1 AND idubicacion != '$idubicacion'", "s")?? [];
// Asignar valores para el estado
$vestado = ($estado == 1) ? 'Activo' : 'Desactivado';
?>

<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>

<body>

    <div id="principal" class="container-fluid">
        <?php include '../navbar_modulos.php'; ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Equipos (Actualizar)</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="./principal.php" class="btn btnModulosPrincipal"><b><i class="fa-solid fa-circle-left"></i> Regresar</b></a>
                        <form action="update.php" method="POST">
                            <input type="hidden" name="idequipo" value="<?php echo $idequipo; ?>">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><b>Equipo: </b></span>
                                <input type="text" class="form-control" name="equipo" required value="<?php echo $equipo; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><b>Serie: </b></span>
                                <input type="text" class="form-control" name="serie" value="<?php echo $serie; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><b>Modelo: </b></span>
                                <input type="text" class="form-control" name="modelo" value="<?php echo $modelo; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01"><b>Categorías</b></label>
                                <select class="form-select" name="idcategoria">
                                    <option value="<?php echo $idcategoria;?>" selected><?php echo $categoria;?></option>
                                    <?php foreach ($dataCategorias as $result): ?>
                                        <option value="<?php echo $result['idcategoria'] ?>"><?php echo $result['categoria'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01"><b>Ubicaciones</b></label>
                                <select class="form-select" name="idubicacion">
                                    <option value="<?php echo $idubicacion;?>" selected><?php echo $ubicacion;?></option>
                                    <?php foreach ($dataUbicaciones as $result): ?>
                                        <option value="<?php echo $result['idubicacion'] ?>"><?php echo $result['ubicacion'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text"><b>Estado</b>: </label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="<?php echo $estado; ?>" selected><?php echo $vestado; ?></option>
                                    <?php if ($estado == 1): ?>
                                        <option value="2">Desactivar</option>
                                    <?php else: ?>
                                        <option value="1">Activar</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <button class="btn btnModulosPrincipal btn-sm"><b>Actualizar <i class="fa-solid fa-rotate"></i></b></button>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if (isset($msj)): ?>
            alertify.alert("Actualizar Equipo", "<?php echo $msj; ?>");
            setTimeout(function() {
                window.location.href = "formUpdate.php?idequipo=<?php echo base64_encode($idequipo); ?>";
            }, 1000);
        <?php endif ?>
    </script>
</body>

</html>
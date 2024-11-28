<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';
if (isset($_POST['idcategoria'])) {
    $idcategoria = $_POST['idcategoria'];
} else {
    $idcategoria = base64_decode($_GET['idcategoria']);
}
if(isset($_GET['msj'])){
    $msj = base64_decode($_GET['msj']);
}

$dataCategoria = CRUD("SELECT * FROM categorias WHERE idcategoria='$idcategoria'", "s");
foreach ($dataCategoria as $result) {
    $categoria = $result['categoria'];
    $estado = $result['estado'];
}
$vestado = ($estado == 1) ? 'Activo' : 'Desactivo';
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>

<body>
    <div id="principal" class="container-fluid">
        <?php
        include '../navbar_modulos.php';
        ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Categoría (Actualizar)</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="./principal.php" class="btn btnModulosPrincipal"><b><i class="fa-solid fa-circle-left"></i> Regresar</b></a>
                        <form action="update.php" method="POST">
                            <input type="hidden" name="idcategoria" value="<?php echo $idcategoria; ?>">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <b>Categoría: </b>
                                </span>
                                <input type="text" class="form-control"  name="categoria" required value="<?php echo $categoria; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01"><b>Estado</b>: </label>
                                <select class="form-select" id="estado" name="estado">
                                    <option value="<?php echo $estado; ?>" selected><?php echo $vestado; ?></option>
                                    <?php if ($estado == 1): ?>
                                        <option value="2">Desactivar</option>
                                    <?php else: ?>
                                        <option value="1">Activar</option>
                                    <?php endif ?>
                                </select>
                            </div>
                            <button class=" btn btnModulosPrincipal btn-sm">
                                <b>Actualizar <i class="fa-solid fa-rotate"></i></b>
                            </button>
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
            alertify.alert("Actualizar Categoría", "<?php echo $msj; ?>");
            setTimeout(function() {
                // Redirigir a la página de destino
                window.location.href = "formUpdate.php?idcategoria=<?php echo base64_encode($idcategoria); ?>";
            }, 1000); // 1000 milisegundos = 1 segundo
        <?php endif ?>
    </script>
</body>

</html>
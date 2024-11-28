<?php
@session_start();
if (isset($_SESSION['login_ok'])) {
} else {
    header('Location: ../../index.php');
}
include '../../models/conexion.php';
include '../../models/funciones.php';
include '../../controllers/funciones.php';

if (isset($_GET['msj'])) {
    $msj = base64_decode($_GET['msj']);
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>

<body>

<div id="principal" class="container-fluid">
    <?php include 'navbar.php'; ?>
    <div class="card" style="margin-top:5px; margin-bottom: 5px;">
        <div class="card-header">
            <b>Panel Equipos (Insertar)</b> <b style="float:right;">Bienvenido/a</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="./principal.php" class="btn btnModulosPrincipal"><b><i class="fa-solid fa-circle-left"></i> Regresar</b></a>
                    <form action="insert.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><b>Equipo: </b></span>
                            <input type="text" class="form-control" name="equipo" required>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><b>Contraseña: </b></span>
                            <input type="password" class="form-control" name="passw" required>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text"><b>Tipo</b>: </label>
                            <select class="form-select" id="tipo" name="tipo" required>
                                <option value="1">Administrador</option>
                                <option value="2">Operador</option>
                            </select>
                        </div>
                        <button class="btn btnModulosPrincipal btn-sm"><b>Insertar <i class="fa-solid fa-plus"></i></b></button>
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
        alertify.alert("Insertar Equipo", "<?php echo $msj; ?>");
        setTimeout(function() {
            window.location.href = "./formInsert.php";
        }, 1000);
    <?php endif ?>
</script>
</body>

</html>

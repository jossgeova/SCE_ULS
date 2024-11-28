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
if (isset($_POST['valorUbicacion'])) {
    $ubicacion = $_POST['valorUbicacion'];
    $dataUbicaciones = CRUD("SELECT * FROM ubicaciones WHERE ubicacion LIKE '%$ubicacion%'", "s")??[];
} else {
    $dataUbicaciones = CRUD("SELECT * FROM ubicaciones", "s");
}
$cont = 0;
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>

<body>
    <div id="principal" class="container-fluid">
        <?php
        include '../../views/navbar_modulos.php';
        ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Ubicaciones</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <div class="row centrar">
                        <div class="col-md-6">
                            <!-- Button Despliega Modal para registrar nueva ubicación -->
                            <button type="button" class="btn btnModulosPrincipal" data-bs-toggle="modal" data-bs-target="#ModalInsertUbicacion">
                                <i class="fa-solid fa-circle-plus"></i>
                            </button>
                            <a href="./principal.php" class="btn btnModulosPrincipal"><i class="fa-solid fa-retweet"></i></a>
                        </div>
                        <div class="col-md-6">
                            <form action="principal.php" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><b>Buscar Ubicación: </b></span>
                                    <input type="text" class="form-control" placeholder="Ingrese Ubicación" name="valorUbicacion">
                                    <button class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if ($dataUbicaciones || is_array($dataUbicaciones)): ?>
                        <table class="table table-borderless table-bordered" style="width: 80%;margin: 0 auto;">
                            <thead class="centrar">
                                <tr>
                                    <th>Nº</th>
                                    <th>Categoría</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="centrar">
                                <!-- Bucle Foreach -->
                                <?php foreach ($dataUbicaciones as $result): ?>
                                    <tr>
                                        <td><?php echo $cont += 1; ?></td>
                                        <td><?php echo $result['ubicacion']; ?></td>
                                        <td><?php echo ($result['estado'] == 1) ? 'Activo' : 'Desactivo'; ?></td>
                                        <td>
                                            <form action="./formUpdate.php" method="POST">
                                                <input type="hidden" name="idubicacion" value="<?php echo $result['idubicacion']; ?>">
                                                <button class="btn btn-success btn-sm" name="FUCATE">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="./del.php" method="POST">
                                                <input type="hidden" name="idubicacion" value="<?php echo $result['idubicacion']; ?>">
                                                <button class="btn btn-danger btn-sm" name="DCATE">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-danger centrar">
                            <b>No existen ubicaciones registradas.....</b>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if (isset($msj)): ?>
            alertify.alert("Registro Usuario", "<?php echo $msj; ?>");
            setTimeout(function() {
                // Redirigir a la página de destino
                window.location.href = "principal.php";
            }, 1000); // 1000 milisegundos = 1 segundo
        <?php endif ?>
    </script>
</body>

</html>
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

// Cambiar 'tipo' a 'idcategoria' porque la base de datos tiene un campo 'idcategoria' en lugar de 'tipo'.
if (isset($_POST['idcategoria'])) {
    $idcategoria = $_POST['idcategoria'];
    // Selecciona los equipos por categoría
    $dataEquipos = CRUD("SELECT * FROM equipos WHERE idcategoria='$idcategoria'", "s") ?? [];
} else {
    // Si no se selecciona categoría, muestra todos los equipos
    $dataEquipos = CRUD("SELECT * FROM equipos", "s") ?? [];
}
$dataCategorias = CRUD("SELECT * FROM categorias WHERE estado=1", "s") ?? [];
$dataUbicaciones = CRUD("SELECT * FROM ubicaciones WHERE estado=1", "s") ?? [];
// Verificar si $dataEquipos contiene resultados válidos
$cont = 0;
?>
<!DOCTYPE html>
<html lang="es">
<?php include '../head.php'; ?>

<body>
    <div id="principal" class="container-fluid">
        <?php include '../../views/navbar_modulos.php'; ?>
        <div class="card" style="margin-top:5px; margin-bottom: 5px;">
            <div class="card-header">
                <b>Panel Equipos</b> <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <div class="row centrar">
                        <div class="col-md-6">
                            <button type="button" class="btn btnModulosPrincipal" data-bs-toggle="modal" data-bs-target="#ModalInsertEquipo">
                                <i class="fa-solid fa-circle-plus"></i>
                            </button>
                            <a href="./principal.php" class="btn btnModulosPrincipal"><i class="fa-solid fa-retweet"></i></a>
                        </div>
                        <div class="col-md-6">
                            <form action="principal.php" method="POST">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01"><b>Categorías</b></label>
                                    <select class="form-select" name="idcategoria">
                                        <option disabled selected>Seleccione Categoría</option>
                                        <?php foreach ($dataCategorias as $result): ?>
                                            <option value="<?php echo $result['idcategoria'] ?>"><?php echo $result['categoria'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <button class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php if (!empty($dataEquipos) && is_array($dataEquipos)): ?>
                        <table class="table table-borderless table-bordered" style="width: 80%;margin: 0 auto;">
                            <thead class="centrar">
                                <tr>
                                    <th>Nº</th>
                                    <th>Equipo</th>
                                    <th>Serie</th>
                                    <th>Modelo</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="centrar">
                                <?php foreach ($dataEquipos as $result): ?>
                                    <tr>
                                        <td><?php echo $cont += 1; ?></td>
                                        <td><?php echo $result['equipo']; ?></td>
                                        <td><?php echo $result['serie']; ?></td>
                                        <td><?php echo $result['modelo']; ?></td>
                                        <td><?php echo ($result['estado'] == 1) ? "Activo" : "Inactivo"; ?></td>
                                        <td>
                                            <?php
                                            echo buscavalor('categorias', 'categoria', 'idcategoria="' . $result['idcategoria'] . '"');
                                            ?>
                                        </td>
                                        <td>
                                            <form action="formUpdate.php" method="POST">
                                                <input type="hidden" name="idequipo" value="<?php echo $result['idequipo']; ?>">
                                                <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="del.php" method="POST">
                                                <input type="hidden" name="idequipo" value="<?php echo $result['idequipo']; ?>">
                                                <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-danger centrar">
                            <b>No se encontraron equipos.</b>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../views/modals/modulos.php'; ?>
    <script>
        <?php if (isset($msj)): ?>
            alertify.alert("Panel Equipos", "<?php echo $msj; ?>");
            setTimeout(function() {
                window.location.href = "./principal.php";
            }, 1000);
        <?php endif ?>
    </script>
</body>

</html>
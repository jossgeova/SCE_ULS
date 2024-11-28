<div class="row" style="margin-top:5px;margin-bottom: 10px;">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b style="float:right;">Bienvenido/a</b>
            </div>
            <div class="card-body">
                <p>
                <h3 class="centrar"><b>Sistema Control Equipo</b></h3>
                <div class="centrar">
                    <img class="img-fluid" src="./public/img/icon.png" alt="">
                    <p>
                    <h3><b>SCE</b></h3>
                    </p>
                </div>
                </p>
                <div class="centrar">
                    <?php if ($_SESSION['tipo'] == 1): ?>
                        <a href="./views/usuarios/principal.php" class="btn btnModulosPrincipal btn-sm">
                            <img src="./public/img/usuarios.png" width="80px" class="img-fluid" alt="">
                            <br>
                            <b>Usuarios</b>
                        </a>
                    <?php else: ?>
                        <a href="./views/usuarios/principal.php" class="btn btnModulosPrincipal btn-sm btnoff">
                            <img src="./public/img/usuarios.png" width="80px" class="img-fluid" alt="">
                            <br>
                            <b>Usuarios</b>
                        </a>
                    <?php endif ?>
                    <a href="./views/categorias/principal.php" class="btn btnModulosPrincipal btn-sm">
                        <img src="./public/img/categorias.png" width="80px" class="img-fluid" alt="">
                        <br>
                        <b>Categorías</b>
                    </a>
                    <a href="./views/ubicaciones/principal.php" class="btn btnModulosPrincipal btn-sm">
                        <img src="./public/img/ubicaciones.png" width="80px" class="img-fluid" alt="">
                        <br>
                        <b>Ubicaciones</b>
                    </a>
                    <a href="./views/equipos/principal.php" class="btn btnModulosPrincipal btn-sm">
                        <img src="./public/img/equipos.png" width="80px" class="img-fluid" alt="">
                        <br>
                        <b>Equipos</b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="centrar footer" style="margin-top: 50px;font-weight: bold;">
    <a href="" class="btn" style="text-align: start;" data-bs-toggle="modal" data-bs-target="#DataEstudiantes"><i class="fa-solid fa-circle-info" style="color: #feb82b;"></i></a>
    © Ciclo 2-2024 Programación Orientada a Objetos (POO) Sábado - Todos los derechos reservados | <b>IV Maho-Raga</b>
</footer>
<?php include './views/modals/modulos.php'; ?>
<?php include './views/modals/info.php'; ?>
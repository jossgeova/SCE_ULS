<div class="contenedor-center">
    <div class="centrar">
        <div class="centrar" style="margin-top: 20px;">
            <h3 class="centrar"><b>Sistema Control Equipo</b></h3>
            <img class="img-fluid" src="./public/img/icon.png" alt="">
            <p>
            <h3><b>SCE</b></h3>
            </p>
        </div>
        <h5><b>Iniciar Sesión</b></h5>
        <form action="./controllers/login.php" method="POST">
            <div class="input-group mb-3 forminput">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                <input type="text" class="form-control" name="user" placeholder="Usuario" required>
            </div>
            <div class="input-group mb-3 forminput">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-key"></i></span>
                <input type="password" class="form-control" name="passw" placeholder="Contraseña" required>
            </div>
            <div class="centrar">
                <button class="btn btn-primary" name="acclogin">
                    <b>Acceder</b>
                </button>
            </div>
        </form>
    </div>
</div>
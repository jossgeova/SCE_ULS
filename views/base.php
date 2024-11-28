<?php
if (isset($_POST['off']) || isset($_GET['off'])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    unset($_SESSION['login_ok']);
    header('Location: index.php');
} else {
    session_start();
    include './models/conexion.php';
    $conecx = new ConexionBD();
    $conecx->getConexion();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./public/img/icon.png" type="image/x-icon">
    <?php if (isset($_SESSION['login_ok'])): ?>
        <title>SCE</title>
    <?php else: ?>
        <title>Login</title>
    <?php endif ?>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/estilo.css">
    <link rel="stylesheet" href="./public/css/jquery-confirm.min.css">
    <!-- alertify -->
    <link rel="stylesheet" href="./public/css/alertify.min.css">
    <link rel="stylesheet" href="./public/css/default.min.css">
    <!-- fonts.googleapis -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
    <!-- Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css" rel="stylesheet" />
    <!-- js -->
    <script src="./public/js/jquery-3.7.1.slim.min.js"></script>
    <script src="./public/js/jquery-1.9.1.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/fontaweson.js"></script>
    <script src="./public/js/alertify.min.js"></script>
    <style>
    .btnModulosPrincipal {
        background-color: #165773;
        /* Color de fondo para los botones */
        color: white;
        margin-bottom: 5px;
    }

    .btnModulosPrincipal:hover {
        background-color: #1a917e;
        /* Color de fondo para los botones */
        color: white;
    }
</style>
</head>

<body>
    <div id="principal" class="container-fluid">
        <?php
        if (isset($_SESSION['login_ok'])) {
            include './views/navbar.php';
        }
        
        if (isset($_SESSION['login_ok'])) {
            include './views/principal.php';
        } else {
            include './views/login.php';
        }
        ?>
    </div>
</body>

</html>
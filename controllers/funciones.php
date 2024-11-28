<?php
function AccesoLogin($user, $passw, $tabla, $campo)
{
    $consultas = new Procesos();
    $data = $consultas->GetDataUser($user, $tabla, $campo);
    if ($data) {
        foreach ($data as $result) {
            $idusuario = $result['idusuario'];
            $clave = $result['passw'];
            $estado = $result['estado'];
            $tipo = $result['tipo'];
        }
        if ($estado == 1) {
            if (password_verify($passw, $clave)) {
                $_SESSION['login_ok'] = 1;
                $_SESSION['idusuario'] = $idusuario;
                $_SESSION['tipo'] = $tipo;
                header("Refresh: 5; URL= ../index.php");
                echo ' <div style="vertical-align:middle;text-align:center;margin-top:50px;">
                            <img src="../public/img/login/load.gif" alt="">
                            <br>
                            Bienvenido/a: ' . $user . '. Cargando sistema espere un momento......
                            
                        </div>';
            } else {
                header("Refresh: 3; URL= ../index.php");
                echo ' <div style="vertical-align:middle;text-align:center;margin-top:50px;">
                <img src="../public/img/login/error.png" width="150px" alt="">
                <br>
                <?
                <b>Contraseña incorrecta......</b>
            </div>';
            }
        } else {
            header("Refresh: 5; URL= ../index.php");
            echo "El usuario no no tiene permisos de acceso......";
        }
    } else {
        header("Refresh: 3; URL= ../index.php");
        echo ' <div style="vertical-align:middle;text-align:center;margin-top:50px;">
                <img src="../public/img/login/error.png" width="150px" alt="">
                
                <br>
                <?
                <b>El usuario no existe............</b>
            </div>';
    }
}

function CRUD($query, $tipo)
{
    $consultas = new Procesos();
    $data = $consultas->isdu($query, $tipo);
    return $data;
}

function buscavalor($tabla, $campo, $condicion)
{
    $valor = NULL;
    $consultas = new Procesos();
    $datos = $consultas->BuscaValor($tabla, $campo, $condicion);
    if ($datos) {
        foreach ($datos as $result) {
            $valor = $result[0];
        }
        return $valor;
    }
}

<?php
class ConexionBD
{
    private $pdo;
    private $dsn = 'mysql:host=localhost;dbname=sce';
    private $username = 'root';
    private $password = '';
    public function __construct()
    {
        try {
            $this->dsn .= ';charset=utf8';
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("SET NAMES 'utf8'");
            //echo "Conectado";
        } catch (PDOException $e) {
            echo 'Conexión fallida!: ' . $e->getMessage();
        }
    }
    public function getConexion(){
        return $this->pdo;
    }
    public function exitConexion(){
        $this->pdo = null;
    }
}

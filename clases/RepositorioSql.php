<?php
require_once('Repositorio.php');
require_once('RepositorioUsuariosSql.php');




// esta es la conexiona mi base de datos
class RepositorioSql extends Repositorio {

  protected $conexion;  

  public function __construct() {

    $dsn = "mysql:host=localhost;dbname=artesanal_beer;
    charset=utf8mb4;port:8889";
    $usuario = "root";
    $password = "root";

    try {
      $this->conexion = new PDO($dsn, $usuario, $password);
    } catch (Exception $e) {

    }

    $this->repositorioUsuarios = new RepositorioUsuariosSql($this->conexion);
  }
}
?>
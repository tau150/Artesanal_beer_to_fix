<?php
  require_once('clases/Auth.php');
  require_once('clases/Validador.php');
  require_once('clases/RepositorioSql.php');

$validador = new Validador();
$db = new RepositorioSql();
$auth = Auth::crearAuth();
?>
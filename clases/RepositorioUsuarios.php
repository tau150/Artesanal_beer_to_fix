<?php

abstract class RepositorioUsuarios{
  public abstract function saveUser(Usuario $usuario);
  // public abstract function getAll();
  public abstract function searchByTerm($term, $data);
}


?>
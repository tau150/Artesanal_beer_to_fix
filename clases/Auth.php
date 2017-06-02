<?php
  class Auth {

  public static $auth;

  public static function crearAuth() {
    if (self::$auth == null) {
      self::$auth = new Auth();
    }
    return self::$auth;
  }

  private function __construct() {
      session_start();

      if (isset($_COOKIE["username"])) {
        $this->loguear($_COOKIE["username"]);
      }
  }

public function loguear($username) {
    $_SESSION["username"] = $username;
  }


  public function loggedIn() {
   return isset($_SESSION["username"]);
  }

  public function usuarioLogueado() {
   return searchByTerm('id', $_SESSION["idUser"]);
  }
}
?>
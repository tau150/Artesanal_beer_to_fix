<?php

require_once("RepositorioUsuarios.php");
require_once("RepositorioUsuariosSql.php");
require_once("Usuario.php");

class RepositorioUsuariosSql extends RepositorioUsuarios {
  protected $conexion;

  public function __construct($conexion) {
    $this->conexion = $conexion;
  }

  public function saveUser(Usuario $usuario) {
   $sql = "INSERT INTO users (id, name, surname, username, document, docNumber, gender, civil, occupation, cuit, email, password) values(default, :name, :surname, :username, :document, :docNumber, :gender, :civil, :occupation, :cuit, :email, :password)";
   $stmt = $this->conexion->prepare($sql);

   $stmt->bindValue(":name", $usuario->getName(), PDO::PARAM_STR);
   $stmt->bindValue(":surname", $usuario->getSurname(), PDO::PARAM_STR);
   $stmt->bindValue(":username", $usuario->getUsername(), PDO::PARAM_STR);
   $stmt->bindValue(":document", $usuario->getDocument(), PDO::PARAM_STR);
   $stmt->bindValue(":docNumber", $usuario->getDocNumber(), PDO::PARAM_INT);
   $stmt->bindValue(":gender", $usuario->getGender(), PDO::PARAM_STR);
   $stmt->bindValue(":civil", $usuario->getCivil(), PDO::PARAM_STR);
   $stmt->bindValue(":occupation", $usuario->getOcuppation(), PDO::PARAM_STR);
   $stmt->bindValue(":cuit", $usuario->getCuit(), PDO::PARAM_INT);
   $stmt->bindValue(":email", $usuario->getEmail(), PDO::PARAM_STR);
   $stmt->bindValue(":password", $usuario->getPassword(), PDO::PARAM_STR);

   $stmt->execute();
 }

//  function traerTodos() {
//     $sql = "Select * from usuario";

//     $stmt = $this->conexion->prepare($sql);

//     $stmt->execute();

//     return Usuario::crearDesdeArrays($stmt->fetchAll(PDO::FETCH_ASSOC));
//   }

 public function searchByTerm($term, $data ){
    $sql = "Select * from users where ". $term . "= :term";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindValue(":term", $data, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($result != false) {
        return Usuario::createUser($result);
    }
    else {
      return NULL;
    }

   }


  // function buscarPorMail($mail) {
  //   $sql = "Select * from usuario where mail = :mail";

  //   $stmt = $this->conexion->prepare($sql);

  //   $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);

  //   $stmt->execute();

  //   $result = $stmt->fetch(PDO::FETCH_ASSOC);

  //   if ($result != false) {
  //       return Usuario::crearDesdeArray($result);
  //   }
  //   else {
  //     return NULL;
  //   }


  // }


  // function buscarPorId($id) {
  //   $sql = "Select * from usuario where id = :id";

  //   $stmt = $this->conexion->prepare($sql);

  //   $stmt->bindValue(":id", $id, PDO::PARAM_INT);

  //   $stmt->execute();

  //   $result = $stmt->fetch(PDO::FETCH_ASSOC);

  //   if ($result != false) {
  //       return Usuario::crearDesdeArray($result);
  //   }
  //   else {
  //     return NULL;
  //   }
  // }
}

?>

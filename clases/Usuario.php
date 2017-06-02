<?php

class Usuario  {
  private $id;
  private $name;
  private $surname;
  private $username;
  private $document;
  private $docNumber;
  private $gender;
  private $civil;
  private $occupation;
  private $cuit;
  private $email;
  private $pasword;

  public function __construct($name, $surname, $username, $document, $docNumber, $gender, $civil, $occupation,  $cuit, $email, $password){
    $this->name = $name;
    $this->surname = $surname;
    $this->username = $username;
    $this->document = $document;
    $this->docNumber = $docNumber;
    $this->gender = $gender;
    $this->civil = $civil;
    $this->occupation = $occupation;
    $this->cuit = $cuit;
    $this->email = $email;
    $this->password = $password;
  }



 public static function hashPassword($password){
   return password_hash($password, PASSWORD_DEFAULT);
 }


  public static function createUserFromArray(Array $data) {
    if (!isset($data["id"])) {
      $data["id"] = NULL;
    }
    if (!isset($data["usuario"])) {
      $data["usuario"] = $data["username"];
    }
    
   $user =  new Usuario(
      $data["name"],
      $data["surname"],
      $data["username"],
      $data["document"],
      $data["docNumber"],
      $data["gender"],
      $data["civil"],
      $data["occupation"],
      $data["cuit"],
      $data["email"],
      $data["password"]
      
    );
    return $user;
  }

   public function toArray() {
    return [
      "id" => $this->getId(),
      "name" => $this->getName(),
      "surname" => $this->getSurname(),
      "username" => $this->getUsername(),
      "document" => $this->getDocument(),
      "docNumber" => $this->getDocNumber(),
      "gender" => $this->getGender(),
      "civil" => $this->getCivil(),
      "occupation" => $this->getOccupation(),
      "cuit" => $this->getCuit(),
      "email" => $this->getEmail(),
      "password" => $this->getPassword()
    ];
  }


  public function getName(){
    return $this->name;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getSurname(){
    return $this->surname;
  }

  public function setSurname($surname){
    $this->surname = $surname;
  }

  public function getUsername(){
    return $this->username;
  }

  public function setUsername($username){
    $this->username = $username;
  }

  public function getDocument(){
    return $this->document;
  }

  public function setDocument($document){
    $this->document = $document;
  }

  public function getDocNumber(){
    return $this->docNumber;
  }

    public function getGender(){
    return $this->gender;
  }

  public function setDocNumber($docNumber){
    $this->docNumber = $docNumber;
  }

  public function getCivil(){
    return $this->civil;
  }

  public function setCivil($civil){
    $this->civil = $civil;
  }

  public function getOcuppation(){
    return $this->occupation;
  }

  public function setOccupation($occupation){
    $this->occupation = $occupation;
  }


  public function getCuit(){
    return $this->cuit;
  }

  public function setCuit($cuit){
    $this->cuit = $cuit;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getPassword(){
      return $this->password;
  }

 public function setPassword($password){
  $this->password = $password;
 }



 public function guardarImagen($unaImagen, $errors) {
		if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES[$unaImagen]["name"];
			$archivo=$_FILES[$unaImagen]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {


  			$miArchivo = dirname(__FILE__, $levels= 2);
  			$miArchivo = $miArchivo . "/usersImg/";
  			$miArchivo = $miArchivo . $_POST["username"] . "." . $ext;
  
        
        // if(file_exists($miArchivo)){
        //   $errors["imgPerfil"] = "Ya existe un archivo con este nombre";
        //   return $errors;
        // }

  			move_uploaded_file($archivo, $miArchivo);
      }
      else {
        $errors["profileImg"] = "Solo se permiten archivos de imagen";
      }
		} else {
      //Acá hay error
      $errors["profileImg"] = "No se pudo subir la foto, intenta mas tarde";
    }
    return $errors;
	}


  public function guardar(RepositorioUsuarios $repo) {
    $repo->saveUser($this);
  }

}


?>
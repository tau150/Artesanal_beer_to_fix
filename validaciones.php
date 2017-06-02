<?php
// session_start();

// Validación de CUIT
function validarCUIT($cuit) {
            $cadena = str_split($cuit);

            $result = $cadena[0]*5;
            $result += $cadena[1]*4;
            $result += $cadena[2]*3;
            $result += $cadena[3]*2;
            $result += $cadena[4]*7;
            $result += $cadena[5]*6;
            $result += $cadena[6]*5;
            $result += $cadena[7]*4;
            $result += $cadena[8]*3;
            $result += $cadena[9]*2;

            $div = intval($result/11);
            $resto = $result - ($div*11);

            if($resto==0){
                if($resto==$cadena[10]){
                    return true;
                }else{
                    return false;
                }
            }elseif($resto==1){
                if($cadena[10]==9 AND $cadena[0]==2 AND $cadena[1]==3){
                    return true;
                }elseif($cadena[10]==4 AND $cadena[0]==2 AND $cadena[1]==3){
                    return true;
                }
            }elseif($cadena[10]==(11-$resto)){
                return true;
            }else{
                return false;
            }
        }


function validaciones($data){
    $errors = [];
  
  // chequeo que le nombre no este vacio
  if (trim($data['name'])== ''){
     $errors['name']= 'Es necesario que ingreses tu nombre';
   }

  //chequeo que el apellido no este vacio
   if(trim($data['surname'])== ''){
     $errors['surname']= 'Es necesario que ingreses tu apellido';
   }


  // chequeo que el username tenga al menos 4 caracteres
  if(strlen(trim($data['username'])) < 4){
     $errors['username']= 'Tu usuario debe contener al menos 4 caracteres';
   } 
   elseif(searchByTerm('username', $data['username']) ){
      $errors['username']= 'Este nombre de usuario ya esta utilizado';
    }


 // chequeo que el numero de documento no este vacio
   if(trim($data['numero'])== ''){
    $errors['numero']= 'Es necesario que ingreses un número de documento';
   }


 // chequeo que el cuit tenga 11 digitos
   if(strlen($data['cuit']) !== 11 ){
     $errors['cuit']= 'La cantidad de números ingresados es incorrecta';
   }
   // uso funciona validadora de cuit
   elseif(!validarCUIT($data['cuit'])){
         $errors['cuit']= 'Es numero de cuit no es válidos';
   }
   elseif(searchByTerm('cuit', $data['cuit']) ){
      $errors['cuit']= 'Este Cuit ya se encuentra registrado';
    }
   


// email no puede estar vacio
   if(trim($data['email']) == ''){
     $errors['email']= 'Tu email es obligatorio';
   }

// chequeo que el email tenga formato aceptado
   elseif(!filter_var( $data['email'], FILTER_VALIDATE_EMAIL)){
    $errors['email']= 'Debes ingresar un correo válido';

  }
  elseif(searchByTerm('email', $data['email']) ){
      $errors['email']= 'Este email de usuario ya esta registrado';
    }


// chequere que la repeticion del email coincida
  if(trim($data['remail']) !== trim($data['remail'])){
    $errors['remail']= 'Tu correo no coincide';
  }

// chequeo qeu el password tenga 5 carateres como minimo
   if(strlen(trim($data['password'])) <5 ){
    $errors['password']= 'Tu password debe contener al menos 5 caracteres';
}


// chequeo que la repeticion del password sea correcta.
elseif(trim($data['password']) !== trim($data['rpassword'])){
  $errors['rpassword']= 'Tu password no coincide';
}

  // retorno el array con todos los errores y su respectiva key
   return $errors;
 }



// guarda la imagen donde indique y le seta un nombre, comprueba el formato
  function guardarImagen($unaImagen, $errors) {
		if ($_FILES[$unaImagen]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES[$unaImagen]["name"];
			$archivo=$_FILES[$unaImagen]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);
      if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {


  			$miArchivo = dirname(__FILE__);
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



  // me guarda todos los users del json en un array.

  function getAllUsers(){
    
    $archivo = file_get_contents('users.json');
    $usuariosJson = explode(PHP_EOL, $archivo);
    array_pop($usuariosJson);
    $finalUsers = [];

   foreach($usuariosJson as $usuario){
     $finalUsers[] = json_decode($usuario, true);

   }
   return $finalUsers;
  }



  // function searchId($id){
  //   $users = getAllUsers();
  //   foreach($users as $user){
  //     if($user['id'] == $id){
  //       return $user;
  //     }
  //   }
  //   return false;
  // }

    function searchByTerm($term, $value){
      $users = getAllUsers();
    foreach($users as $user){
      if($user[$term] == $value){
        return $user;
      }
    }
    return false;
    }


  //   function searchCuit( $cuit){
  //   $users = getAllUsers();
  //   foreach($users as $user){
  //     if($user['cuit'] == $cuit){
  //       return $user;
  //     }
  //   }
  //   return false;
  // }

  // function searchUsername($username){
  //   $users = getAllUsers();
  //   foreach($users as $user){
  //     if($user['username'] == $username){
  //       return $user;
  //     }
  //   }
  //   return false;
  // }

  //   function searchEmail($email){
  //   $users = getAllUsers();
  //   foreach($users as $user){
  //     if($user['email'] == $email){
  //       return $user;
  //     }
  //   }
  //   return false;
  // }



// me genera un id para cada user al momento de crearlo
function createId(){
  $users = getAllUsers();
  if(count($users)==0){
    return 1;
  }
  
   $id = 1;

    foreach ($users as $user) {
    	if ($user['id'] > $id) {
    		$id = $user['id'];
    	}
    }

    // Le sumamos uno y lo devolvemos
    return $id + 1;
  
}
  

// crea usuario
  function createUser($datos){

  $user = [
    "name" => $datos["name"],
    "surname" => $datos['surname'],
    "username" => $datos['username'],
    "document" => $datos['document'],
    "docNumber" => $datos['numero'],
    "gender" => $datos['gender'],
    "civil" => $datos['civil'],
    "occupation" => $datos['occupation'],
    "cuit"=> $datos['cuit'],
    "email"=> $datos['email'],
    "password" => password_hash($datos['password'], PASSWORD_DEFAULT),
    "id" => createId()
  ];

  return $user;
}


// guarda usuario en el archivo json.
function saveUser($user){
  $json = json_encode($user);
  file_put_contents('users.json', $json . PHP_EOL , FILE_APPEND);
}



function checkUser($username){
  
  $users = getAllUsers();
    foreach($users as $user){
      if($user['username'] == $username){
        return $user;
      }
    }
    return false;
  }

function checkPassword($password, $username){
  $user = checkUser($username);
  if(password_verify($password, $user['password'])){
    return true;
  }
   return false; 
}


function checkCookie(){

  if(isset($_COOKIE['username'])){
    $_SESSION['username'] = $_COOKIE['username'];
    // $_SESSION['id'] = $_COOKIE['id'];

  }
}


function editUser($data){
  $user= searchId($data['id']);


}
?>
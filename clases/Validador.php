<?php


require_once('RepositorioUsuariosSql.php');




class Validador {

 private function validarCUIT($cuit) {
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



public function validarInformacion($data , RepositorioUsuarios $repo){
    
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
   elseif($repo->searchByTerm('username', $data['username'] !== null) ){
      $errors['username']= 'Este nombre de usuario ya esta utilizado';
    }


 // chequeo que el numero de documento no este vacio
   if(trim($data['docNumber'])== ''){
    $errors['numero']= 'Es necesario que ingreses un número de documento';
   }


 // chequeo que el cuit tenga 11 digitos
   if(strlen($data['cuit']) !== 11 ){
     $errors['cuit']= 'La cantidad de números ingresados es incorrecta';
   }
   // uso funciona validadora de cuit
   elseif(!$this->validarCUIT($data['cuit'])){
         $errors['cuit']= 'Es numero de cuit no es válidos';
   }
   elseif($repo->searchByTerm('cuit', $data['cuit']) ){
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
  elseif($repo->searchByTerm('email', $data['email']) ){
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

}
?>
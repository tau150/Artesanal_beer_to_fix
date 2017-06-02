<?php
	require_once('support.php');
	require_once('clases/Usuario.php');
	require_once('clases/RepositorioUsuarios.php');

	if($_POST and isset($_SESSION['username'])){
		header("Location: index.php");exit;
	}

	

	$name = '';
	$surname ='';
	$username ='';
  $document='';
	$docNumber = '';
	$gender = '';
	$civil = '';
	$occupation = '';
	$cuit= '';
	$email = '';
	$password = '';

	


 if($_POST){
	 // chequea por errores y los guarda en un array para mostrarlos donde corresponda
	 $errors = $validador->validarInformacion($_POST, $db->getRepositorioUsuarios());
	 $users = [];

	 if(!isset($errors['name'])){
		 $name = $_POST['name'];
		  }
	 if(!isset($errors['surname'])){
		 $surname = $_POST['surname'];
		  }

	 	 if(!isset($errors['docNumber'])){
		 $docNumber = $_POST['docNumber'];
		  }

		if(!isset($errors['cuit'])){
		 $cuit = $_POST['cuit'];
		  }

		if(!isset($errors['email'])){
		 $email = $_POST['email'];
		  }

				if(count($errors)== 0){
				
					$user = $_POST;
					$user['password']= Usuario::hashPassword($_POST['password']);
					$user = Usuario::createUserFromArray($user);
					
					$errors = $user->guardarImagen("profileImg", $errors);
					$user->guardar($db->getRepositorioUsuarios());
				
					$userUsername = $user->getUsername();

		      $auth->loguear($userUsername);
					header("Location: index.php");exit;

				}

	 
 }

?>





<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registro de Usuario - Venta de cerveza Artesanal</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>

	<!--Variable que activa la clase en NAV-->
	<?php $activo = "register"; ?>

	<!--Include HEADER-->
	<?php include_once('includes/header.php'); ?>

	<!-- container start -->
	<div class="container">

		<!--Sub - container Start-->
		<div class="sub_container">

		<h1 class="text_center titulo_h1">Registro de usuario</h1>

			<!-- section resister start -->
			<section id="formulario_registro" class="main-content">

			    <div class="register">

					<!-- formulario start -->
				    <form action="register.php" method="post" enctype="multipart/form-data">
				    
						<fieldset>
							<legend>Datos Personales</legend>

							<label for="name">Nombre</label>
						<label for="" class='error-label'>
							<?php  if( isset($errors['name'])){
								echo $errors['name'];
							}?>
							</label>
							<input type="text" name="name" value=<?= $name ?> >
							<label>
							Apellido
							</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['surname'])){
								echo $errors['surname'];
							}?>
							</label>
							<input type="text" name="surname" value=<?= $surname ?>  >


							<label>
							Usuario
							</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['username'])){
								echo $errors['username'];
							}?>
							</label>
							<input type="text" name="username" value=<?= $username ?>  >



							<label for="document">Tipo de Documento</label>
								<select name="document">
								<option value="dni">Documento de Identidad</option>
								<option value="pass" >Pasaporte</option>>
								<option value="libenrol">Libreta de Enrrolamiento</option>
								<option value="libretaciv">Libreta Civica</option>
							</select>

							<label for="numero">Numero</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['docNumber'])){
								echo $errors['docNumber'];
							}?>
							</label>
							<input type="number" name="docNumber" value=<?= $docNumber ?> >

							<label for="gender">Genero</label>
								<select name="gender" >
								<option value="male">Masculino</option>
								<option value="female">Femenino</option>
								<option value="sd">Sin Datos</option>
							</select>

							<label for="civil">Estado Civil</label>
							<select class="" name="civil" >
								<option value="single">Soltero/a</option>
								<option value="married">Casado/a</option>
								<option value="widowed">Viudo/a</option>
								<option value="Divorced">Divorciado/a</option>
								<option value="other">Otro/a</option>
							</select>

							<label for="occupation">Ocupación</label>
							<select class="" name="occupation" >
								<option value="mono">Monotributista</option>
								<option value="auto">Autonomo</option>
								<option value="pensio">Pensionado</option>
								<option value="jubil">Jubilado</option>
								<option value="amade">Ama de Casa</option>
								<option value="estud">Estudiante</option>
								<option value="desocp">Desocupado</option>
								<option value="empleadorel">Empleado en relacion de dependencia</option>
								<option value="other">Otro</option>
							</select>

							<label for="cuit">CUIT</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['cuit'])){
								echo $errors['cuit'];
							}?>
							</label>
							<input type="text" name="cuit" value=<?= $cuit ?>  >

							<label for="correo">E-mail</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['email'])){
								echo $errors['email'];
							}?>
							</label>
							</label>
							<input type="text" name="email" value=<?= $email?>  >

							<label for="remail">Reingrese el E-mail</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['remail'])){
								echo $errors['remail'];
							}?>
							</label>
							
							<input type="email" name="remail" value="">

							<label for="rcorreo">Password</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['password'])){
								echo $errors['password'];
							}?>
							</label>
							<input type="password" name="password" value="" >

							<label for="rcorreo">Reingrese el Password</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['rpassword'])){
								echo $errors['rpassword'];
							}?>
							</label>
							<input type="password" name="rpassword" value="">

							<label for="">Imagen de Perfil</label>
							<?php  if( isset($errors['profileImg'])){
								echo $errors['profileImg'];
							}?>

						<input type="file" name="profileImg" id="">

							<div class="contenedores_button">
								<button id="enviar" type="submit" name="enviar">Enviar</button>
								<button id="reset" type="reset" name="reset">Borrar</button>							
							</div>

						</fieldset>
				    </form>
					<!-- formulario end -->

			    </div>
		  	</section>
			<!-- section resister end -->

		</div>
		<!--Sub - container end-->

	</div>
	<!-- container end -->

	<?php include_once('includes/footer.php'); ?>

	<!--Scripts Menu-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>
	
</body>
</html>


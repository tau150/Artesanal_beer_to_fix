<?php

	require_once('support.php');
 	
	// checkCookie();
	if(isset($_SESSION['username'])){
			header("Location: index.php");exit;
	}


	$username = '';
	
	if($_POST){
		$errors = [];

		$repo = $db->getRepositorioUsuarios(); 
		$user = $repo->searchByTerm('username', $_POST['username']);
		
		$passHash =  $user->getPassword();
		
	  if( $user == null){
			 $errors['username'] = 'El usuario no existe';
		}
		
		elseif( $auth->checkPassword($_POST['password'], $passHash)){
			
		
				$_SESSION['username']= $_POST['username'];
				// $user = searchUsername($_POST['username']);
				// $_SESSION['id']= $user['id'];

						// if(isset($_POST['user_recordar'])){
						// 	$expira = time()+3600; 
						// 	setcookie('username',  $_POST['username'] , $expira);
						// 	$user = searchUsername($_POST['username']);
						// 	setcookie('id', $user['id'] , $expira);

						// 	}
				header("Location: index.php");exit;
		}
		else{
			$username = $_POST['username'];
			$errors['password'] = 'El password es incorrecto';

	
		};

	



	}

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Venta de cerveza Artesanal</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="css/ionicons.min.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
	
	<!--Variable que activa la clase en NAV-->
	<?php $activo = "login"; ?>

	<!--Include HEADER-->
	<?php include_once('includes/header.php'); ?>

	<!-- container start -->
	<div class="container">

		<!--Sub - container Start-->
		<div class="sub_container">

			<h1 class="text_center titulo_h1">Login de usuario</h1>

			<!-- section resister start -->
			<section id="login" class="main-content">

			    <div class="register">

					<!-- formulario start -->
				    <form action="login.php" method="post">
				    
						<fieldset>
							<legend>Login de Usuario</legend>

							<label for="usuario">Usuario</label>
						 <label for="" class='error-label'>
							<?php  if( isset($errors['username'])){
								echo $errors['username'];
							}?>
							</label>
							<input type="text" name="username" required value= <?= $username ?>> 

							<label for="pass">Contraseña</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['password'])){
								echo $errors['password'];
							}?>
							</label>
							<input type="password" name="password" value="" required>

							<a href="register.php">Aún no sos usuario?</a><br>
							<a href="#">Olvidaste tu contraseña?</a><br>
							&nbsp;<br>

							<input type="checkbox" name="user_recordar" value="RP">Recordar Usuario<br> 

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
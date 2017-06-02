<?php

require_once('validaciones.php');
checkCookie();

if(isset($_SESSION['id'])){
//  $user = searchId($_SESSION['id']);
 $user = searchByTerm('id', $_SESSION['id']);

 	$name = $user['name'];
	$surname = $user['surname'];
  $document= $user['document'];
	$docNumber = $user['docNumber'];
	$civil = $user['civil'];
	$occupation = $user['occupation'];
	$cuit= $user['cuit'];

}else{
  header("Location: login.php");exit;
}


if($_POST){
	editUser($_POST);
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Venta de cerveza Artesanal</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="css/ionicons.min.css" rel="stylesheet">
	<!--<link href="css/normalize.css" rel="stylesheet">-->
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
</head>
<body>
	
	<!--Variable que activa la clase en NAV-->
	<?php $activo = "profile"; ?>
	
	<!--Include HEADER-->
	<?php include_once('includes/header.php'); ?>


	<!--Container start-->
	<div class="container">
    <section class="profile">
      <p>Bienvenido a tu perfil : <?= $user['name'] ?> </p>

      <div class="container-perfil">
        <div class="container-img-perfil">
          <img class='profile-img' src="usersImg/<?=$user['username'].'.'.'jpg'?>">
        </div>

					
      </div>
    </section>
				<!-- section resister start -->
			<section id="formulario_registro" class="main-content">

			    <div class="register">

					<!-- formulario start -->
				    <form action="profile.php" method="post" enctype="multipart/form-data">
				    
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





							<label for="document">Tipo de Documento</label>
								<select name="document">
								<option value="dni">Documento de Identidad</option>
								<option value="pass" >Pasaporte</option>>
								<option value="libenrol">Libreta de Enrrolamiento</option>
								<option value="libretaciv">Libreta Civica</option>
							</select>

							<label for="numero">Numero</label>
							<label for="" class='error-label'>
							<?php  if( isset($errors['numero'])){
								echo $errors['numero'];
							}?>
							</label>
							<input type="number" name="numero" value=<?= $docNumber ?> >

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
								<button id="enviar" type="submit" name="enviar">Guardar</button>
						
							</div>

						</fieldset>
				    </form>
					<!-- formulario end -->

			    </div>
		  	</section>
			<!-- section resister end -->
  </div>

	<!--Include HEADER-->
	<?php include_once('includes/footer.php'); ?>



	<!--Scripts Menu-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/index.js"></script>
	
</body>
</html>
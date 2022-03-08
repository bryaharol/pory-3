<?php 
  require 'conex.php';
  $message = ''; 

//nos registramos en la tabla users con nuestros correos
  if (!empty($_POST['email'])  && !empty($_POST['password'])) {

  	$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
  	$stmt = $conn->prepare($sql); 
    $stmt->bindParam(':email', $_POST['email']);//vincular parametros 
  	$password = password_hash($_POST['password'], PASSWORD_BCRYPT); /* hash cifra los datos del pasword mediante el BCRYPT*/
  	$stmt->bindParam(':password', $password);
  	

//comprobacion mediante condicional con variables locales

  	if ($stmt->execute()) {
  		$message = 'Nuevo usuario Registrado con Exito';
  	}
  	else{
  		$message ='Lo sentimos,Ocurio un problema al crear su cuenta. Intente Nuevamente';
  	}
  }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	 <?php require 'partials/header.php'?>

	 <?php if(!empty($message)): ?>

	 	<p><?=$message?></p>
	 	
	 <?php endif;?>

	 <h1>SingUp</h1>
	 	<span>Volver a <a href="login.php">Iniciar Secion</a></span>

	 <form action="signup.php" method="post">
			<input type="text" name="email" placeholder="Enter Your email">
			<input type="password" name="password" id="" placeholder="Enter Your Password">
			<input type="password" name="confirm_password" id="" placeholder="confrim Your Password">
			<input type="submit" value="Enviar">
	</form>
	
	</body>
</html>
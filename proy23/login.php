<?php

session_start(); // iniciamos la variable secion para despues utilizarla

if(isset($_SESSION['user_id'])){  //si esta configurada la secion y is existe es por que uya esta registrado 
	header('location : /proy2');    // redireccionamos a nuestra misma agina iniciada

}

require 'conex.php';

//consulta  la base de datos para verificar las credenciales

if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email =:email');//obtenemos el parametro email y lo viculamos
	$records->bindParam(':email', $_POST['email']); //ejecutamos la consulta 
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);//obtenemos los datos del usuario

	$message= ''; //manadamos un mensaje de erroe o validacion

	if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){ /*comparamos la contraseña que esta introduciendo con los results con el password de la base de datos */

		$_SESSION['user_id'] = $results['id']; //verifica si es correcto y lo almacena en una varibale de secion y luego lo direcicionamos
		header('location: /proy2'); 
	}
	else{
		$message = 'Sorry, those credentials do not match';
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

	<br>


	<!-- para utilizar la cabecera en varias ventanas como el login -->
	 <?php require 'partials/header.php' ?>

	<h1>Unidad de Operaciones</h1>
	<br>
	<br>

<!-- para interactuar con la secion y el login en caso de no  estar registrado-->
	<span><a href="signup.php">Registrarse</a></span>
	

	<!--imprimimos un mensaje si encaos de diera error en la validacion de las credenciales-->

	<?php if(!empty($message)): ?>

		<p><?=$message?></p>

	<?php endif;?>	


	
	<form action="http://localhost:8080/proy2/dashboard/index.html" method="post">

		<input type="text" name="email" placeholder="Introduce tu correo">
		<br>
		<input type="password" name="password" id="" placeholder="Ingreas tu contraseña">
		<br>
		<input type="submit" value="enviar">
	</form>
	
</body>
</html>
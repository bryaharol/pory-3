<?php // inicializamos script php

  session_start();

  require'conex.php';

  if (isset($_SESSION['user_id'])) { /*si existe esta secion haremos una conulta a las base de datos*/
  	$records = $conn->prepare('SELECT id,email,password FROM users WHERE id = :id');
  	$records->bindParam(':id', $_SESSION ['user_id']); 
  	$records->execute();     //ejecutamos el query
  	$results = $records->fetch(PDO::FETCH_ASSOC);      /*obtenemos los resultados comprobamos el resultado con lo siguiente*/

  	$user = null; // lo almacenamos 

  	if(count($results) > 0) { /*definimos si los resultados son mayores a 0 para comprobar que no esta vacio */  
  		$user = $results;
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
	<!--cabecera -->
  
  <?php require 'partials/header.php' ?>
  <!-- esta parte es temporal el cambio de pantalla debe realizarse cunado el usuario preione sen debera enviarlo al dashboard-->

  <?php if(!empty($user)): ?>

  	<br> Welcome. <?= $user['email']; ?>
  	<br> Your are Successfully Logged In 
  	<a href="logout.php"> Logout</a>
  	
  <?php else: ?>


	<h1> Please Login or Signup</h1>

	<a href="login.php">Login</a>
	<a href="signup">Signup</a>

	<?php endif ?>
</body>
</html>
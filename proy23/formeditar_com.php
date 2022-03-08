<?php
    if (!isset($_GET['id_compania']))
        exit();

    $id_compania = $_GET['id_compania'];
    include_once "conex_com.php";
    $stmt = $conex->prepare("SELECT * FROM compania WHERE id_compania =?;");
    $stmt->execute([$id_compania]);
    $esc = $stmt->fetch(PDO::FETCH_OBJ);

    if ($esc===FALSE) 
    {
    	echo "EL registro no existe";
    	exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		
		<h1>EDITAR INFORMACION DE LA COMPAÑIA</h1>
		<hr>
		<form method="post" action="editar_com.php" class="form-vertical">
          <input type="hidden" name="id_compania" value="<?php echo $esc->id_compania?>">

          <div class="row form-group">
          	<div class="col-sm-2">
            <label for="nombre" class="control-label">Nombre de La Compañia:</label>
            </div>
            <div class="col-sm-10">
			<input type="text" name="nombre_com" id="nombre_com" value="<?php echo $esc->nombre_com?>" class="form-control" placeholder="Edite el nombre de la compañia">
			</div>
		  </div>
		  
		  <div class="row form-group">
		  <div class="col-sm-2">	
            <label for="nombre_ins" class="control-label">Nombre Oficial:</label>
           </div>
           <div class="col-sm-10">
			<input type="text" name="nombre_ins" id="nombre_ins" value="<?php echo $esc->nombre_ins?>"  class="form-control" placeholder="Edite el Nombre del Oficial">
			</div>
		   </div>
		  

		   

			<input type="submit" class="btn btn-success" value="Guardar">
			
		</form>
	</div>

</body>
</html>
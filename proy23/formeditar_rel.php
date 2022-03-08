<?php
    if (!isset($_GET['id_relacion']))
        exit();
    
    $id_relacion = $_GET['id_relacion'];
    include_once "conex_rel.php";
    $stmt = $conex->prepare("SELECT * FROM relacion_nominal WHERE id_relacion =?;");
    $stmt->execute([$id_relacion]);
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
		
		<h1>EDITAR RELACION NOMINAL</h1>
		<hr>
		<form method="post" action="editar_rel.php" class="form-vertical">
          <input type="hidden" name="id_relacion" value="<?php echo $esc->id_relacion?>">

          <div class="row form-group">
          	<div class="col-sm-2">
            	<label for="cod_estudiante" class="control-label">Codigo Estudiante</label>
            </div>
            <div class="col-sm-10">
				<input type="text" name="cod_estudiante" id="cod_estudiante" value="<?php echo $esc->cod_estudiante?>" class="form-control" placeholder="Edite el codigo estudiante">
			</div>
		  </div>
		  
		  <div class="row form-group">
		  <div class="col-sm-2">	
            <label for="nombre_com" class="control-label">Nombre Compañia</label>
           </div>
           <div class="col-sm-10">
			<input type="text" name="nombre_com" id="nombre_com" value="<?php echo $esc->nombre_com?>"  class="form-control" placeholder="Edite el Nombre de la compañia">
			</div>
		   </div>
		  
		  <div class="row form-group">
		  <div class="col-sm-2">	
            <label for="apellido_p" class="control-label">Apellido Peterno</label>
           </div>
           <div class="col-sm-10">
			<input type="text" name="apallido_p" id="apellido_p" value="<?php echo $esc->apellido_p?>"  class="form-control" placeholder="Edite el apellido paterno">
		   </div>
		   </div>

			<div class="row form-group">
		  <div class="col-sm-2">	
            <label for="apellido_m" class="control-label">Apellido Materno</label>
           </div>
           <div class="col-sm-10">
			<input type="text" name="apallido_m" id="apellido_m" value="<?php echo $esc->apellido_m?>"  class="form-control" placeholder="Edite el apellido materno">

			</div>
		   </div>

		   

			<input type="submit" class="btn btn-success" value="Guardar">
			
		</form>
	</div>

</body>
</html>
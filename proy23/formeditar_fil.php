<?php
    if (!isset($_GET['id_filiacion']))
        exit();

    $id_filiacion = $_GET['id_filiacion'];
    include_once "conex_fil.php";
    $stmt = $conex->prepare("SELECT * FROM filiacion_personal WHERE id_filiacion =?;");
    $stmt->execute([$id_filiacion]);
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
		
		<h1> EDITAR FILIACION PERSONAL</h1>
		<hr>
		<br>
		<br>
		<form method="post" action="editar_fil.php">
			<input type="hidden" name="id_filiacion" value="<?php echo $esc->id_filiacion?>">

          <div class="row form-group">
          		<div class="col-sm-2">
            		<label for="nommbre_apellido" class="control-label">Nombre y Apellido</label>
            	</div>
            	<div class="col-sm-10">
					<input type="text" name="nommbre_apellido" value="<?php echo $esc->nommbre_apellido?>">
				</div>
		  	</div>

		  		<div class="row form-group">
		 			 <div class="col-sm-2">	
            			<label for="fecha_nac" class="control-label">Fecha de Nacimiento</label>
           			</div>
          				 <div class="col-sm-4">
							<input type="date" id="fecha_nac" name="fecha_nac" value="<?php echo $esc->fecha_nac?>" min="1980-01-01" max="2080-12-31">
						</div>
						<div class="col-sm-2">	
           			 <label for="numero_ci" class="control-label">Nº de Carnet</label>
           				</div>
           				<div class="col-sm-4">
							<input type="text" name="numero_ci" id="numero_ci" class="form-control" value="<?php echo $esc->numero_ci?>">
						</div>
		   		</div>

		   		

		   <div class="row form-group">
		   	 <div class="col-sm-4">
		  		<div class="input-group mb-3">
  					<div class="input-group-prepend">
    				<label class="input-group-text" for="tipo_sangre">Tipo de Sangre</label>
  					</div>
  						<select class="custom-select" name="tipo_sangre" id="tipo_sangre" value="<?php echo $esc->tipo_sangre?>" >
    						<option selected >Elija una opcion</option>
   				 			<option value="O+"> O+</option>
    						<option value="O-"> O-</option>
    						<option value="A-"> A-</option>
    						<option value="A+"> A+</option>
    						<option value="B-"> B-</option>
    						<option value="B+"> B+</option>
    						<option value="AB-"> AB-</option>
    						<option value="AB+" > AB+</option>
  						</select>
				</div>
			</div>

				<div class="col-sm-2">	
            		<label for="domicilio_actual" class="control-label">Domicilio Actual</label>
         		</div>
          			<div class="col-sm-6">
							<input type="text" name="domicilio_actual" id="domicilio_actual" class="form-control" value="<?php echo $esc->domicilio_actual?>" placeholder="Indique su Domicilio Actual">
					</div>
			</div>

		   <div class="row form-group">
		  			<div class="col-sm-2">	
            			<label for="telefono" class="control-label">Telefono</label>
           			</div>
           			<div class="col-sm-4">
						<input type="int" name="telefono" id="telefono" class="form-control" value="<?php echo $esc->telefono?>" placeholder="Indique su Numero de Tel/Cel">
					</div>
		  </div>

		  <div class="row form-group">
		  	<div class="col-sm-2">	
            	<label for="nombre_p" class="control-label">Nombre del Padre</label>
        	 </div>
          <div class="col-sm-4">
				<input type="text" name="nombre_p" id="nombre_p" class="form-control" value="<?php echo $esc->nombre_p?>" placeholder="Ingrese el Nombre completo del Padre">
			</div>
			<div class="col-sm-2">	
            	<label for="nombre_m" class="control-label">Nombre de la Madre</label>
         	</div>
          	<div class="col-sm-4">
				<input type="text" name="nombre_m" id="nombre_m" class="form-control" value="<?php echo $esc->nombre_m?>" placeholder="Ingrese el Nombre completo de la Madre">
			</div>
		  </div>

		  <div class="row form-group">
		  		<div class="col-sm-4">	
            		<label for="Emergencia" class="control-label">En caso De Emergencia Comunicarse Con</label>
          		</div>
        		<div class="col-sm-8">
					<input type="text" name="Emergencia" id="Emergencia" class="form-control" value="<?php echo $esc->Emergencia?>" >
				</div>
		  </div>

		  <div class="row form-group">
		  		<div class="col-sm-2">	
            		<label for="direccion_f" class="control-label">Direccion </label>
          		</div>
          		<div class="col-sm-4">
					<input type="text" name="direccion_f" id="direccion_f" class="form-control" value="<?php echo $esc->direccion_f?>"  >
				</div>
				<div class="col-sm-2">	
            		<label for="telefono_f" class="control-label">Telefono</label>
          		</div>
          	<div class="col-sm-4">
					<input type="int" name="telefono_f" id="telefono_f" class="form-control" value="<?php echo $esc->telefono_f?>" >
			</div>
		  </div>

      		<div class="row form-group">
		 		 <div class="col-sm-2">	
           	 			<label for="profesion_oficio" class="control-label">Profesion u Oficio</label>
           		</div>
           		<div class="col-sm-6">
					<input type="text" name="profesion_oficio" id="profesion_oficio" class="form-control" value="<?php echo $esc->profesion_oficio?>" >
				</div>
		  </div>


		   



		   

			<input type="submit" class="btn btn-success" value="Guardar">
			
		</form>
	</div>

</body>
</html>
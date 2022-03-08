<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  

</head>
<body>
<header>
<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<a class="navbar-brand" href="index.php">EMI-UASC</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
<ul class="navbar-nav mr-auto">

<li class="nav-item active">
<a class="nav-link" href="http://localhost:8080/proy2/dashboard/index.html">INICIO<span class="sr-only">(current)</span></a>
</li>

</ul>
<form class="form-inline mt-2 mt-md-0">
<input class="form-control mr-sm-2" type="text" placeholder="...." aria-label="Search">
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>
</div>
</nav>
</header>
<br>
<br>
<br>
<br>
 <div class="container-fluid">
   <div class=""><a href="http://localhost:8080/proy2/form_fil.html" class="btn btn-primary" target="_blank"> <i class="fas fa-plus-circle"></i> Nuevo </a></div>
 </div>
 <br>

<div class="container-fluid">
  <h4>INFORMACION PERSONAL</h4>
  <br>


  
  <table class="table table-striped table-hover">
    <thead class="table-dark">
         <tr>
           <th>Nombres y Apellidos</th>
           <th>Fecha de Naciemiento</th>
           <th>Numero de CI</th>
           <th>Tipo de Sangre</th>
           <th>Domicilio Actual</th>
           <th>Telefono</th>
           <th>Nombre del padre</th>
           <th>Nombre de la Madre</th>
           <th>Emergencia</th>
           <th>Direccion Familiar</th>
           <th>Telefono Familiar</th>
           <th>Profesion u Oficio</th>

           

           <th><span class="badge badge-info" >OPCION</span></th>
         </tr>
      
    </thead>
    <tbody>
<?php
 try
 {
  //paso 1 conexion
  $conex = new PDO("mysql:host=localhost;dbname=emi2" , "root","");
    //paso2 preparar la consulta con cursor
    $stmt = $conex->prepare("SELECT * FROM filiacion_personal");
  
    //ENVIAR A MYSQL LA CONSULTA 
    $stmt->execute();
    //mostrar resultado 
    //echo "<h4> Listado de personas</h4>";
    while ($row = $stmt->fetch(PDO::FETCH_OBJ))
    {
      echo "<tr>";

      echo "<td>" .$row->nommbre_apellido . "</td>";
      echo "<td>" .$row->fecha_nac. "</td>";
      echo "<td>" .$row->numero_ci . "</td>";
      echo "<td>" .$row->tipo_sangre . "</td>";
      echo "<td>" .$row->domicilio_actual . "</td>";
      echo "<td>" .$row->telefono . "</td>";
      echo "<td>" .$row->nombre_p . "</td>";
      echo "<td>" .$row->nombre_m . "</td>";
      echo "<td>" .$row->Emergencia . "</td>";
      echo "<td>" .$row->direccion_f . "</td>";
      echo "<td>" .$row->telefono_f . "</td>";
      echo "<td>" .$row->profesion_oficio . "</td>";
     

      echo "<td><a href=formeditar_fil.php?id_filiacion=".$row->id_filiacion." class='btn btn-info'><i class='fa fa-pen'></i>Editar</a></td>";

    } 
}
 catch (PDOException $e)
 {
   echo $e->getMessage();

 }

?>



      </tbody>
  </table>
        </div>
    </body>
</html>
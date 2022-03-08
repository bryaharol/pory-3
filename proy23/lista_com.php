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
<a class="navbar-brand" href="#">EMI-UASC</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarCollapse">
<ul class="navbar-nav mr-auto">

<li class="nav-item active">
<a class="nav-link" href="http://localhost:8080/proy2/dashboard/index.html"> INICIO<span class="sr-only">(current)</span></a>
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
 <div class="container">
   <div class="card-body"><a href="http://localhost:8080/proy2/form_com.html" class="btn btn-primary" target="_top"> <i class="fas fa-plus-circle"></i> Nuevo </a></div>
 </div>

 <!--<input class="form-control" type="text" placeholder="Buscar" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>-->

<div class="container">
  <br>


  <h4>INFORMACION COMPAÑIA</h4>

  <br>
  <br>

  
  <table class="table table-striped table-hover">
    <thead class="table-dark">
         <tr>
           <th>Nº de compañia</th>
           <th>Nombre de la Compañia</th>
           <th>Oficial </th>
           

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
    $stmt = $conex->prepare("SELECT * FROM compania");
  
    //ENVIAR A MYSQL LA CONSULTA 
    $stmt->execute();

    //mostrar resultado 
    //echo "<h4> Listado de la compañia</h4>";

    while ($row = $stmt->fetch(PDO::FETCH_OBJ))
    {
      echo "<tr>";      
      echo "<td>" .$row->id_compania . "</td>";
      echo "<td>" .$row->nombre_com . "</td>";
      echo "<td>" .$row->nombre_ins . "</td>";
     

      echo "<td><a href=formeditar_com.php?id_compania=".$row->id_compania." class='btn btn-info'><i class='fa fa-pen'></i>Editar</a></td>";

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
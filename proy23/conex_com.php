<?php

try
{

     $dsn ="mysql:host=localhost;dbname=emi2";
     $user ="root";
     $pwd ="";

     $conex = new PDO($dsn,$user,$pwd);
     /*echo " <h1> CONEXION REALIZADA CORRECTAMENTE </h1>";*/
}
catch(PDOException $e)
{

	echo $e->getMessage();
}

?>
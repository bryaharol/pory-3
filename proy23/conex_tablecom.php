<?php
   include_once "conex_com.php";
   //PASO : VERIFICAR QUE LAS CASILLAS DEL FORMULARIO NO ESTE VACIA
   if (  !isset($_POST["nombre_com"]) || !isset($_POST["nombre_ins"]))
      exit();

   //PASO 2: RECUPERAR LOS DATOS DEL FORMULARIO QUE REGISTRO EL USR.
  
   $nombre_com = $_POST["nombre_com"];
   $nombre_ins = $_POST["nombre_ins"];


   //PASO 3: INSERT INTO ENVIAR A LA BD = PREPARE
   $stmt = $conex->prepare("INSERT INTO compania (nombre_com,nombre_ins) VALUES (?,?);");
   $resul = $stmt->execute([$nombre_com,$nombre_ins]);

   if ($resul)
   {
      echo "<h2>REGISTRO CORRECTAMENTE</h2>";
      header("Location:http://localhost:8080/proy2/lista_com.php");
        exit();
   }


   else
      echo "PROBLEMAS AL REGISTRAR";
?>
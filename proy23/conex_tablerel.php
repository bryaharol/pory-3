<?php
   include_once "conex_rel.php";
   //PASO : VERIFICAR QUE LAS CASILLAS DEL FORMULARIO NO ESTE VACIA
   
   if ( !isset($_POST["cod_estudiante"]) || !isset($_POST["nombre_com"]) || !isset($_POST["apellido_p"]) || !isset($_POST["apellido_m"]) ||!isset($_POST["nombres"]))
      exit();

   //PASO 2: RECUPERAR LOS DATOS DEL FORMULARIO QUE REGISTRO EL USR.
   
   $cod_estudiante = $_POST["cod_estudiante"];
   $nombre_com = $_POST["nombre_com"];
   $apellido_p = $_POST["apellido_p"];
   $apellido_m = $_POST["apellido_m"];
   $nombres = $_POST["nombres"];


   //PASO 3: INSERT INTO ENVIAR A LA BD = PREPARE
   $stmt = $conex->prepare("INSERT INTO relacion_nominal (cod_estudiante,nombre_com,apellido_p,apellido_m,nombres) VALUES (?,?,?,?,?);");
   $resul = $stmt->execute([$cod_estudiante,$nombre_com,$apellido_p,$apellido_m,$nombres]);

   if ($resul)
   {
      echo "<h2>REGISTRO CORRECTAMENTE</h2>";
      header("Location:http://localhost:8080/proy2/lista_rel.php");
        exit();
   }


   else
      echo "PROBLEMAS AL REGISTRAR";
?>
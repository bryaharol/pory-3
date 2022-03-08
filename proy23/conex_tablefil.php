<?php
   include_once "conex_fil.php";
   //PASO : VERIFICAR QUE LAS CASILLAS DEL FORMULARIO NO ESTE VACIA

   if ( !isset($_POST["nommbre_apellido"]) || !isset($_POST["fecha_nac"]) || !isset($_POST["numero_ci"]) || !isset($_POST["tipo_sangre"]) || !isset($_POST["domicilio_actual"]) || !isset($_POST["telefono"]) || !isset($_POST["nombre_p"]) || !isset($_POST["nombre_m"]) || !isset($_POST["Emergencia"]) || !isset($_POST["direccion_f"]) || !isset($_POST["telefono_f"]) || !isset($_POST["profesion_oficio"]))
      exit();

   //PASO 2: RECUPERAR LOS DATOS DEL FORMULARIO QUE REGISTRO EL USR.
   
   $nommbre_apellido = $_POST["nommbre_apellido"];
   $fecha_nac = $_POST["fecha_nac"];
   $numero_ci = $_POST["numero_ci"];
   $tipo_sangre = $_POST["tipo_sangre"];
   $domicilio_actual = $_POST["domicilio_actual"];
   $telefono = $_POST["telefono"];
   $nombre_p = $_POST["nombre_p"];
   $nombre_m = $_POST["nombre_m"];
   $Emergencia = $_POST["Emergencia"];
   $direccion_f = $_POST["direccion_f"];
   $telefono_f = $_POST["telefono_f"];
   $profesion_oficio = $_POST["profesion_oficio"];


   //PASO 3: INSERT INTO ENVIAR A LA BD = PREPARE
   $stmt = $conex->prepare("INSERT INTO filiacion_personal (nommbre_apellido,fecha_nac,numero_ci,tipo_sangre,domicilio_actual,telefono, nombre_p,nombre_m,Emergencia,direccion_f,telefono_f,profesion_oficio) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");

   $resul = $stmt->execute([$nommbre_apellido,$fecha_nac,$numero_ci,$tipo_sangre,$domicilio_actual,$telefono,$nombre_p,$nombre_m,$Emergencia,$direccion_f,$telefono_f,$profesion_oficio]);

   if ($resul)
   {
      echo "<h2>REGISTRO CORRECTAMENTE</h2>";
     header("Location:http://localhost:8080/proy2/lista_fil.php");
        exit();
   }


   else
      echo "PROBLEMAS AL REGISTRAR";
?>
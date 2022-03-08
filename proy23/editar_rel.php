<?php
// paso1 verificar que exiten datos en el formulario
    if (!isset($_POST['cod_estudiante']) ||
        !isset($_POST["nombre_com"]) ||
        !isset($_POST["apellido_p"]) ||
        !isset($_POST["apellido_m"]) ||
        !isset($_POST["nombres"]))  
     {   
    	exit();
    }

    //pso 2 establecer la conexion con bd de mysql
    include_once 'conex_rel.php';
    //paso 3  obtener datos del formulario
    $id_relacion =$_POST["id_relacion"];
    $cod_estudiante =$_POST["cod_estudiante"];
    $nombre_com =$_POST["nombre_com"];
    $apellido_p =$_POST["apellido_p"];
    $apellido_m =$_POST["apellido_m"];
    $nombres =$_POST["nombres"];

    $stmt = $conex->prepare("UPDATE relacion_nominal SET cod_estudiante=?, nombre_com=?, apellido_p=?, apellido_m=?, nombres=? WHERE id_relacion=?");

    $ok = $stmt->execute([$cod_estudiante, $nombre_com, $apellido_p, $apellido_m,      $nombres, $id_relacion]);

    if ($ok == TRUE)
      {
        header("Location: http://localhost:8080/proy2/lista_rel.php");
        exit();
      }
    else
    echo "Error al  guardar los cambios"
?>
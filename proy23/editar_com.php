<?php
// paso1 verificar que exiten datos en el formulario
    if (!isset($_POST['nombre_com'])  || !isset($_POST["nombre_ins"])) 

    { 
        
    	exit();
    }

    //paso 2 establecer la conexion con bd  emi2 de mysql

    include_once 'conex_com.php';

    //paso 3  obtener datos del formulario

    $id_compania =$_POST["id_compania"];
    $nombre_com =$_POST["nombre_com"];
    $nombre_ins =$_POST["nombre_ins"];
    

    $stmt = $conex->prepare("UPDATE compania SET nombre_com=?, nombre_ins=? WHERE id_compania=?");

    $ok = $stmt->execute([$nombre_com, $nombre_ins, $id_compania]);

    if ($ok == TRUE)
      {
        header("Location: http://localhost:8080/proy2/lista_com.php");
        exit();
      }
    else
    echo "Error al  guardar los cambios"
?>

<?php

include('db.php');
include('includes\session.php');

if (isset($_POST['guardar'])) {
  $titulo = $_POST['titulo'];
  $fecha = $_POST['fecha'];
  $cliente = $_POST['cliente'];
  $precio = $_POST['precio'];
  $calificacion = $_POST['calificacion'];
  $pago="";
  if (isset($_POST['pago'])){
    $pago="Si";
  }else{
    $pago="No";
  } 

$Usuario=0;
$Usuario = $_SESSION['idUsuario']; 


    //sin el titulo o sin el cliente salta al index        
          $archivo ="";
 
                 // subo la imagen
                     $archivo = basename($_FILES["foto"]["name"]);
                     if(!move_uploaded_file($_FILES["foto"]["tmp_name"],"imagenes/".$archivo)){ 
                       $mensajeError = $mensajeError."<h5>La foto no fue subida</h5>";
                        $archivo="";
                    }
          
   
   //Guardo en la Base de datos

   if($titulo<>""){

   $insert = $conn->prepare("INSERT INTO trabajos (titulo, fecha, cliente, precio, calificacion, pago, foto, idUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
   $insert->bind_param("sssdissi", $titulo, $fecha, $cliente, $precio, $calificacion, $pago, $archivo, $Usuario);

    $insert->execute();
    $resultado = $insert->get_result();

    $_SESSION['message'] = 'Se guardo con éxito'.$mensajeError;
    $_SESSION['message_type'] = 'success';
  
  }else{
    $_SESSION['message'] = 'El campo Titulo  esta vacio, no se han guardado los datos';
    $_SESSION['message_type'] = 'danger';
  }
   header('Location: index.php');

  }
?>
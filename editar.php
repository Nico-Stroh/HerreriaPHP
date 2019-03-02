<?php

function selec($num1,$num2){
  if($num1==$num2){
    return "SELECTED";
  }else{
    return "";
  }
}

include('includes\session.php');
include("db.php");

$titulo = "";
$fecha= "";
$cliente= "";
$precio=0;
$calificacion=0;
$pago="";
$foto="";

//Los datos para llenar los campos *******************************
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM trabajos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $fecha = $row['fecha'];
    $cliente = $row['cliente'];
    $precio =$row['precio'];
    $calificacion= $row['calificacion'];
    $pago= $row['pago'];
    $foto= $row['foto'];             
  }
   $archivo=$foto;
 
}


//Los datos para guardar la base de datos ***************************

if (isset($_POST['editar'])) {
  $id = $_GET['id'];
  $titulo= $_POST['titulo'];
  $fecha = $_POST['fecha'];
  $cliente=$_POST['cliente'];
  $precio=$_POST['precio'];
  $calificacion=$_POST['calificacion'];
  $pago="";
  if (isset($_POST['pago'])){
    $pago="Si";
  }else{
    $pago="No";
  } 

  $FotoError="";     

/********************* Sube la imagen ************************************ */
if (isset($_FILES["foto"])){

              // Subo la foto 
              $archivo = basename($_FILES["foto"]["name"]);
              move_uploaded_file($_FILES["foto"]["tmp_name"],"imagenes/".$archivo);
              $guardarFoto="";
              if($archivo<>""){
                  $guardarFoto = ", foto ='".$archivo."'";
              }    
      }

 
/*********************** actualizo en la base de datos ************************************************** */
     $query = "UPDATE trabajos SET titulo = '$titulo', fecha = '$fecha', cliente = '$cliente' , precio =$precio , calificacion = $calificacion , pago = '$pago'  $guardarFoto WHERE id=$id" ;
     if(mysqli_query($conn, $query)) {

          $_SESSION['message']  = 'Se actualizo con éxito'.$FotoError;
          $_SESSION['message_type'] = 'warning';
         header('Location: index.php');
    } else{
          $_SESSION['message']  = 'No se actualizo'.$FotoError;
          $_SESSION['message_type'] = 'danger';
          header('Location: index.php');
    }
  }
/********************************************************************** */
?>
<?php include('includes/header.php'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3 ">
            <img width='500px' src='imagenes/Blacksmith.png'>
        </div>

        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <h2>Editar Trabajo</h2><br>
                <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Titulo</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Fecha</h4>
                        </div>
                        <div class="col-sm-9">
                            <input type="date" name="fecha" class="form-control" min="2010-01-1" max="2030-12-31"
                                step="1" value="<?php echo $fecha; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Cliente</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="cliente" type="text" class="form-control" value="<?php echo $cliente; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Precio</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="precio" type="number" class="form-control" value="<?php echo $precio; ?>"
                                min="1">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6" id="visorArchivo">
                            <?php
               $file ="imagenes/".$foto;
                $existe= file_exists("$file");
                  if($existe && !($foto=="")){?>
                            <h4>Foto</h4>
                            <img width="180px" src="imagenes/<?php echo $foto; ?>">
                            <?php }?>
                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <h4>Calificacion</h4>
                                <select name="calificacion" class="form-control">
                                    <?php $selec="";
                $selec=selec($calificacion,1);
                echo  "<option value='1'".$selec.">♥</option>";
                $selec=selec($calificacion,2);
                echo  "<option value='2'".$selec.">♥♥</option>";
                $selec=selec($calificacion,3);
                echo  "<option value='3'".$selec.">♥♥♥</option>";
                $selec=selec($calificacion,4);
                echo  "<option value='4'".$selec.">♥♥♥♥</option>";
                $selec=selec($calificacion,5);
                echo  "<option value='5'".$selec.">♥♥♥♥♥</option>";
                  ?>
                                </select>
                            </div>
                            <h4>Pago</h4>
                            <?php 
            if ($pago=="Si"){
              $Selected=TRUE;
            }else{
              $Selected=FALSE;
            }
        ?>
                            <input type="checkbox" id="mePago" name="pago" <?php echo ($Selected ? 'checked' : '') ?>>
                            <label for="mePago"><br>
                                <h4>Me Pago</h4>
                            </Label>
                        </div>

                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="form-control" onchange="return validarExt()">
                    </div>

            </div>
            <button class="btn btn-lg  btn-block btn btn-success" name="editar">Actualizar</button>
            </form>
        </div>

    </div>

</div>
<?php include('includes\footer.php'); ?>
</div>
<script type="text/javascript">
function validarExt() {
    var archivoInput = document.getElementById('foto');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.JPG|.jpg)$/i;
    if (!extPermitidas.exec(archivoRuta)) {
        alert('Asegurese de haber seleccionado una imagen');
        archivoInput.value = '';
        return false;
    } else {
        if (archivoInput.files && archivoInput.files[0]) {
            var visor = new FileReader();
            visor.onload = function(e) {
                document.getElementById('visorArchivo').innerHTML = '<embed src="' + e.target.result +
                    '" width="180" height="120" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>
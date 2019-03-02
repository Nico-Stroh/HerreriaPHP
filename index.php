<?php
   include('includes\session.php');
   include('db.php');  
?>

<html>

<head>
    <?php  
             include('includes\header.php');  

             $usuario= $_SESSION['nombreUsuario'];
             $UsuarioId= $_SESSION['idUsuario'];
      ?>
    <title>Home </title>
</head>



<body>
    <div class="row">
        <div class="col-sm-3">
            <br>
            <h1> Bienvenido <?php echo $_SESSION['nombreUsuario']; ?></h1>
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <h5><?= $_SESSION['message']?></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>


            <?php   
                         $_SESSION['nombreUsuario'] = $usuario;
                         $_SESSION['idUsuario']=$UsuarioId;
                      
                  include('includes\formNuevoTrabajo.php'); 
            ?>
            <div class="container">
                <br>

                <?php 
               include('includes\formConsultas.php');  
                include('includes\progresbar.php');
                  include('includes\MostrarDatos.php');   
            ?>
                <h2><a href="logout.php">Cerrar sesión</a></h2>

            </div>
        </div>
    </div>
</body>


</html>
<script type="text/javascript">
function validarExt() {
    var archivoInput = document.getElementById('archivoInput');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.jpg)$/i;
    if (!extPermitidas.exec(archivoRuta)) {
        alert('Asegurese de haber seleccionado una imagen');
        archivoInput.value = '';
        return false;

    } else {
        //PRevio del PDF
        if (archivoInput.files && archivoInput.files[0]) {
            var visor = new FileReader();
            visor.onload = function(e) {
                document.getElementById('visorArchivo').innerHTML =
                    '<embed src="' + e.target.result + '" width="280" height="180" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>
<?php 
    include('includes\footer.php');
?>
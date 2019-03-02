<?php
   
    session_start();

    include('db.php');
    
    $usuario = "";
    $error = "";
    $usuarioTabla= "";
    $contraseña="";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //formulario y  evito la inyeccion de sql
        $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
        //tabla
        $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
  
        $resultado = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($resultado);


        $usuarioTabla=$row['usuario'];
        $contraseña=$row['pass'];
        $UsuarioId=$row['id'];


        if($usuario == $usuarioTabla && $password == $contraseña && $usuario<>"") {
            $_SESSION['nombreUsuario'] = $usuario;
            $_SESSION['idUsuario']=$UsuarioId;
         
            header("location: index.php");
        } else {
            $error = "El usuario o la clave es invalida";
            
        }
    }   
?>
<html>

<head>
    <?php include('includes\header.php'); ?>
    <title>Login</title>
</head>

<body>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <img width='500px' src='imagenes/Blacksmith.png'>
            </div>
            <div class="col-sm-4">
                <br>
                <div class="Login">
                    <h1>Registrarse<br></h1> <br>
                    <form method="post" class="form-signin">
                        <div class="form-group">
                            <label>
                                <h4>Usuario:</h4>
                            </label>
                            <input class="form-control" type="text" name="usuario" value="<?php echo $usuario ?>"
                                autofocus require />
                        </div>
                        <div class="form-group">
                            <label>
                                <h4>Password:</h4>
                            </label>
                            <input class="form-control" type="password" name="password" autofocus require />
                            <br>
                        </div>
                        <label><?php echo $error ?></label><br />
                        <input type="submit" name="enviar" class="btn btn-lg btn-block btn btn-success" value="Enviar"
                            autofocus /><br>

                    </form>
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div>
    </div>
</body>

</html>
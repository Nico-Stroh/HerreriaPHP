<table class="table table-bordered">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Fecha</th>
            <th>Cliente</th>
            <th>Precio</th>
            <th>Calificacion</th>
            <th>Pago</th>
            <th>Foto</th>
            <th>Editar / Eliminar</th>
        </tr>
    </thead>
    <tbody>

        <?php
          $campo= "titulo";
          $num="0";
          $consulta="";
          $signo=">=";
          if (isset($_POST['buscar'])) {
            $valor=$_POST['opcion'];
            switch ($valor) {
                case 1:
                      $consulta=mysqli_real_escape_string($conn,$_POST['titulo']);
                      $campo = "titulo";
                      break;
                case 2:
                      $consulta=mysqli_real_escape_string($conn,$_POST['titulo']);
                      $campo = "cliente";
                      break;
                case 3:
                      $signo=">=";
                      $num =mysqli_real_escape_string($conn, $_POST['titulo']);
                      break;
                case 5:
                      $signo="<=";
                      $num = mysqli_real_escape_string($conn,$_POST['titulo']);   
                      break;    
            }
         }

          
         // $Usuario=0;
         // $Usuario = $_SESSION['idUsuario']; 

          $num = (int) $num;
          $pago="";
          $query = "SELECT * FROM trabajos WHERE $campo Like '%$consulta%' AND precio $signo $num ";
       
          if (isset($_POST['pago'])) {
            switch ($_POST['pago']) {
              case 1:
                    $query;
                    break;
              case 2:
                    $query=$query."AND pago = 'Si'";
                    break;
              default: 
                    $query=$query."AND pago = 'No'";
             }
          }

          if (isset($_POST['orden'])) {
            switch ($_POST['orden']) {
              case 1:
                   $ordenar="titulo";
                    break;
              case 2:
                    $ordenar="fecha";
                    break;
              case 3:
                    $ordenar="cliente";
                    break;
              case 4:
                    $ordenar="precio";
                    break;
              default: 
                    $ordenar="calificacion desc";
             }$query=$query."ORDER BY $ordenar";
          }

          
          $resultado = mysqli_query($conn, $query);  
        

          //llena los campos con los datos de la tabla
          while($row = mysqli_fetch_assoc($resultado)) { ?>



        <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['cliente']; ?></td>
            <td><?php echo "$".$row['precio']; ?></td>
            <td>
                <?php 
            $puntuacion=$row['calificacion'];
            switch ($puntuacion) {
                    case 1:
                       echo "<h6 style='color:#FF3200;'>";
                        echo "▓▓▓";  
                        echo"</h6>";
                        break;
                    case 2:
                       echo "<h6 style='color:#E88604;'>";
                        echo "▓▓▓▓▓";
                        echo"</h6>";
                        break;
                    case 3:
                        echo"<h6 style='color:#FFD608;'>";
                        echo "▓▓▓▓▓▓▓▓▓";
                        echo"</h6>";
                        break;
                    case 4:
                        echo"<h6 style='color:#9EE804;'>";
                        echo "▓▓▓▓▓▓▓▓▓▓▓▓▓";
                        echo"</h6>";
                        break;
                    
                    default:
                        echo"<h6 style='color:#06FF33;'>";
                        echo "▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓";
                        echo"</h6>";
             } ?>
            </td>
            <td><?php echo $row['pago']; ?></td>
            <td>
                <div class="modal-container">
                    <?php 
                      $foto=$row["foto"];
                      $file ='imagenes/'.$foto;
                      $existe= file_exists( $file );
                      if($existe && ($foto<>"")){
                      echo "<a href='imagenes/".$foto."'>'";?>
                    <?php echo "<img width='40px' src='imagenes/".$row['foto']."'/> ";?> </a> <?php } ?>
                </div>

            </td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        <?php } ?>

    </tbody>
</table>
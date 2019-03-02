<?php

include('db.php');
$query = "SELECT(SELECT COUNT(*) FROM trabajos WHERE pago='Si') as pagado,  
                (SELECT COUNT(*) FROM trabajos) as total";

$result = mysqli_query($conn, $query);
$quantity = mysqli_fetch_assoc($result);

$X=0;

//pone el porcentaje de las tareas terminadas para la barra 
if ($quantity['total']==0){
       $X=0;
}else{
      $X=($quantity['pagado']/$quantity['total'])*100;   
}

$X = (int) $X;

echo "<div class='progress'>
       <div class='progress-bar progress-bar-striped bg-success' role='progressbar' aria-valuenow='75' aria-valuemin='0' aria-valuemax='100' style='width: $X%'>Trabajos Pagos ".$X."%</div>
        </div>";
?>
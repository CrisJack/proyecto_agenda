<?php
include("conectar.php");
$con=conectar();

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Agenda Personal de la Semana</title>
</head>
<body>
<?php
if (isset ($_SESSION['iniciosesion'])) {
  ini_set('date.timezone','America/Lima');
  setlocale(LC_TIME, "spanish");
 $fecha_actual = date("Y-m-d");
 
$consulta="SELECT * FROM evento where usuario='".$_SESSION['iniciosesion']."'";
$rconsulta=mysqli_query($con,$consulta);

foreach ($rconsulta as $alert) {
  if($alert['fecha']==$fecha_actual){
    
    ?>
      <script type="text/javascript">
          alert("Hoy tiene agendado: "+"<?php echo $alert['titulo'];?>"+" a las "+"<?php echo $alert['hora'];?>");          
          </script>;
    <?php
  }
  if($alert['fecha']<$fecha_actual){
    $eliminar=$alert['fecha'];
    
    $ins="DELETE FROM evento WHERE fecha = '$eliminar'";

    mysqli_query($con,$ins) or die (mysql_error());
  }

}
 
 
  
?>            
<div class="container">
<div class="row-fluid">
    <h2 class="my-3 ml-2">
            <?php
            if (isset ($_SESSION['iniciosesion'])) {
            echo "<b>Bienvenido(a):</b> ".$_SESSION['iniciosesion'];
            }else{
             echo "Aún nadie inicio sesión";
            }
            

            ?>
    </h2>
    <hr>
    
    </div>
    
    <div class="row my-2 justify-content-between">
    <div class="col-auto">
    <form  method="post">
        <input type="button" class="btn btn-primary" data-toggle="modal"  data-target="#crear_evento" value="Crear Evento">
        </form> 
    </div>
    <!-- Modal -->
<div class="modal fade" id="crear_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Nuevo Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="crear_evento.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Título del Evento</label>
    <input name="titulo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese un título">    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción del Evento</label>
    <textarea name="descripcion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la descripción del evento"></textarea>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha del Evento</label>
    <input name="fecha" type="date" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Fecha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hora del Evento</label>
    <input name="hora" type="time" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Hora">
  </div>
  
  <button type="submit" class="btn btn-primary">Crear Evento</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modificar_evento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Evento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="crear_evento.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Título del Evento</label>
    <input name="titulo" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese un título">    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Descripción del Evento</label>
    <input name="descripcion" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese la descripción del evento">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha del Evento</label>
    <input name="fecha" type="date" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Fecha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Hora del Evento</label>
    <input name="hora" type="time" class="form-control" id="exampleInputPassword1" placeholder="Ingrese la Hora">
  </div>
  
  <button type="submit" class="btn btn-primary">Modificar Evento</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
<!-- Modal -->


    <div class="col-auto">
    <form action="cerrar.php" method="post">
        <input class="btn btn-success" type="submit" value="cerrar sesión">
        </form> 
    </div>
    </div>    
    
    <table class="table table-bordered text-center">
    <thead class="thead-dark">
    <tr>
    <th scope="col">Horas</th>
    <?php 
   
   for($i=0;$i<7;$i++){
       $Nueva_Fecha= date("D j-M-Y",strtotime($fecha_actual."+ $i days"));
   $Mes_Anyo = strftime("%A, %d", strtotime($Nueva_Fecha));
  //  $Mes_Anyo = strftime("%A, %d de %B de %Y", strtotime($Nueva_Fecha));
   ?><th scope="col"><?php echo $Mes_Anyo;?></th><?php 
   }
   ?>
    </tr>
    </thead>
    <tbody>
       
    
    <?php 
    $consulta="SELECT * FROM evento where usuario='".$_SESSION['iniciosesion']."' order by hora asc";
    $rconsulta=mysqli_query($con,$consulta);






    for($j=8;$j<=24;$j++){
    ?>  
    <tr>  
      <th> <?php 
      //echo $valor['hora'];
      echo $j.":00:00";
      ?> </th>
      <?php     
   for($i=0;$i<7;$i++){
       $Nueva_Fecha= date("Y-m-d",strtotime($fecha_actual."+ $i days"));
       $Mes_Anyo = strftime("%A, %d", strtotime($Nueva_Fecha)); 

       
        ?>
        <td>
        <?php
        foreach($rconsulta as $valor){
          if ($valor['fecha']==$Nueva_Fecha && $valor['hora']==$j){
        
        
        
        
        
        ?>
        <form action="modificar_evento.php" method="POST">
        <button type="submit" name="id" style="border:none; background:none;"  value="<?php    
        echo $valor['id_evento'];?>"><?php
        
        
        echo $valor['titulo'];
        
        
        
        ?></button>          
         </form>
         </td>
        <?php 
       }
      }

   }
   ?>     
    </tr>
    <?php    
    }
   ?>
  
  </tbody>
    </table>
</div>







<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<?php
}else{
header("refresh:0.5;url=index.php");
}

?>
</body>
</html>
<?php
include ("conectar.php");
$con=conectar();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<main>
<div class="container">
<div class="row justify-content-center">
<div class="col-6 mt-3">
<div class="row text-center">
  <div class="col-12">
  <h1>Modificar Evento</h1>

<?php
if ($_POST) {
    $id=$_POST['id'];
    $consulta="SELECT * FROM evento where id_evento='$id'";
    $rconsulta=mysqli_query($con,$consulta);
    foreach($rconsulta as $valor){

        $titulo=$valor['titulo'];
        $descrip=$valor['descripcion'];
        $fecha=$valor['fecha'];
        $hora=$valor['hora'];
?>
  </div>

</div>
<hr>
<div class="row">
  <div class="col-12 p-0 m-0">
    <form action="borrar.php" method="POST">
      <button type="submit" name="id" class="btn btn-danger" style="width:100%;" value="<?php echo $id ?>">Borrar Evento</button>
    </form>
  </div>   
</div>
<br>
<div class="row">
  <div class="col-12 p-0 m-0">
    <form action="agenda.php">
      <button type="submit" class="btn btn-success" style="width:100%;"><< Atras</button>
    </form>
  </div>  
</div>
<div class="row">
  <div class="col-12">
  <form action="modificar.php" method="POST">

<div class="form-group">
<!-- <label for="exampleInputEmail1">ID</label> -->
<input type="hidden" class="form-control" name="id_evento" value="<?php echo $id ?>" >    
</div>
<div class="form-group">
<label for="exampleInputEmail1">Titulo</label>
<input type="text" class="form-control" name="titulo"  value="<?php echo $titulo ?>" >    
</div>
<div class="form-group">
<label for="exampleInputPassword1">Descripción</label>
<textarea type="text" class="form-control" name="descripcion" value="<?php echo $descrip ?>"><?php echo $descrip ?></textarea>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Fecha</label>
<input name="fecha" type="date" class="form-control" value="<?php echo $fecha ?>">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Hora</label>
<input name="hora" type="time" class="form-control" value="<?php echo $hora ?>">
</div>  
<div class="row justify-content-center">
<button type="submit" class="btn btn-primary" style="width:100%;">Modificar</button>  
</div>  
</form>
</div> 
</div>
 <?php
}
    
}
?>
    
    </div>
    </div>
    </div>






<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>





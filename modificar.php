<?php
include ("conectar.php");
$con=conectar();
session_start();




if(isset($_SESSION['iniciosesion'])){

    if ($_POST) {
    $id=$_POST['id_evento'];
    $titulo=$_POST['titulo'];
    $descrip=$_POST['descripcion'];
    $fecha=$_POST['fecha'];
    $hora=$_POST['hora'];
    $user=$_SESSION['iniciosesion'];    
echo $id;
    $ins="UPDATE evento SET titulo = '$titulo', descripcion='$descrip', fecha='$fecha', hora='$hora', usuario='$user' WHERE id_evento = $id ";

    mysqli_query($con,$ins) or die (mysql_error());
    header("refresh:0.5;url=agenda.php");

}else{
     echo'<script type="text/javascript">
        alert("los datos son erroneos);        
       </script>';
     header("refresh:0.5;url=agenda.php");
}
    
    }
?>

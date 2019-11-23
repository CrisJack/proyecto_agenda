<?php
include ("conectar.php");
$con=conectar();

session_start();

$consulta="SELECT * FROM usuario";
$rconsulta=mysqli_query($con,$consulta);
foreach($rconsulta as $valor){
    if($_POST['username']==$valor['usuario'] && $_POST['password']==$valor['password']){
        $_SESSION['iniciosesion']=$valor['nombre'];
        header("refresh:0.5;url=agenda.php");
    }else{
        //  echo'<script type="text/javascript">
        //  alert("La Contraseñas no Coincide");
        //  window.location.href="index.php";
        //  </script>';
          header("refresh:0.5;url=agenda.php");
    }
}


?>
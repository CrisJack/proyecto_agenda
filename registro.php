<?php
include ("conectar.php");
$con=conectar();


if($_POST){
$usuario=$_POST['usuario'];
$nombre=$_POST['nombre'];
$pass=$_POST['password'];
$rpass=$_POST['rpassword'];

if($pass==$rpass){
    
    $ins="insert into usuario(usuario,nombre,password) values('$usuario','$nombre','$pass')";

    mysqli_query($con,$ins) or die (mysql_error());
    header("refresh:0.5;url=index.php");
}else{
    echo'<script type="text/javascript">
        alert("Las Contraseñas no Coinciden");
        window.location.href="index.php";
        </script>';
        //header("refresh:0.5;url=index.php");
}

}
?>
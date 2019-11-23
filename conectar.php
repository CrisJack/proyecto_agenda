<?php
function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $db="agenda";

    $con=mysqli_connect($server,$user,$pass,$db) or die ("error en la conexión");
    return $con;
}
conectar();
?>
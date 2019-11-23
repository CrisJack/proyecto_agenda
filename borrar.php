<?php
include ("conectar.php");
$con=conectar();

    if ($_POST) {
    $id=$_POST['id'];
       

    $ins="DELETE FROM evento WHERE id_evento = $id ";

    mysqli_query($con,$ins) or die (mysql_error());
    header("refresh:0.5;url=agenda.php");

}else{
     echo'<script type="text/javascript">
        alert("los datos son erroneos);        
       </script>';
     header("refresh:0.5;url=agenda.php");
}   
    
?>

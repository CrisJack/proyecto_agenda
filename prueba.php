<?php 
    ini_set('date.timezone','America/Lima');
    setlocale(LC_TIME, "spanish");
   $fecha_actual = date("d-m-Y");
   for($i=0;$i<7;$i++){
       $Nueva_Fecha= date("Y-m-d",strtotime($fecha_actual."+ $i days"));
   $Mes_Anyo = strftime("%A, %d", strtotime($Nueva_Fecha));  
    echo $Nueva_Fecha;
   }
   ?>
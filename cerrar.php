<?php
session_start();
//session_destroy();//cierra todas las sesiones
unset($_SESSION['primerasesion']);//cierra una sesion especifica
echo "se cerro sesión";
session_destroy();
//echo "Se cerraron todas las sesiones";
header("refresh:0.5;url=index.php");

//INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`) VALUES (NULL, 'cristhian', 'crisjack');
?>
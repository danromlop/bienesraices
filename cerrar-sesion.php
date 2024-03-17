<?php 

session_start();

var_dump($_SESSION);
//cerramos sesion rescribiendo la variable global con un array vacio
$_SESSION = [];

header("Location: /bienesraices/index.php")

?>
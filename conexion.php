<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
  $user="root";
	$pass="kakaroto";
	$server="localhost";
	$bd="partidos";
$conexion =new mysqli($server,$user,$pass,$bd);
if(mysqli_connect_errno()){
	echo"No Conectado" , mysqli_connect_error();
	exit();
}else{
	/*echo"CONECTADO A LA BASE DE DATOS";*/
}
?> 
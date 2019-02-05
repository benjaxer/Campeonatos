<?php 
include("conexion.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
$ID=$_GET['id'];
$EliminarSujeto="DELETE FROM sujeto WHERE IdPersonas='$ID'";
$resultado=$conexion->query($EliminarSujeto);
  echo "<script>
       alert('Registro Eliminado Exitosamente');
       window.location='index.php';
       </script>";
$conexion->close();


?>
<?php
include("conexion/conexionbd.php");
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: index.php");
}
$nivel=$_SESSION['tipo_usuario'];   
if($nivel!="1"){
	   header("Location:index.php");  
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
/*Mostrar Informacion de Usuario*/  

$iduser=$_SESSION['id_usuario'];
$sql="SELECT u.Idusuario, a.NombreA FROM usuarios AS u INNER JOIN alumnos AS A ON u.IdAlumno=a.IdAlumno
      WHERE u.IdUsuario= $iduser"; 
    $resultado=$conexion->query($sql);
    $row = $resultado->fetch_assoc();

$alumnos="SELECT u.Idusuario, a.NombreA,a.CorreoA,u.NombreU
                  FROM usuarios AS u INNER JOIN alumnos AS a ON u.Idusuario=a.IdAlumno";
$resultadoalumnos=$conexion->query($alumnos);

?>
<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=" CRUD en PHP y Mysql - Registro de usuarios y asignaturas">
<meta name="author" content="Jairo Galeas">
<link rel="icon" href="../../../../favicon.ico">

<title>Administracion</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="jumbotron.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">


<div class="collapse navbar-collapse" id="navbarsExampleDefault">
<ul class="navbar-nav mr-auto">
    <?php require_once("menusuperior.php"); ?>
  <?php
      if($_SESSION['tipo_usuario']==1){
  ?>
       <li class="nav-item">
       <a class="nav-link" href="listausuarios.php">Lista de Usuarios</a>
      </li> 
  <?php } ?>

</ul>
 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo utf8_decode($row['NombreU']);?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Perfil</a>
    <a class="dropdown-item" href="salir.php">Cerrar</a>
  </div>
</div>
</div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
  <div class="container">
     
<h3><center>Registro de Asignaturas</center></h3>
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
      Codigo: <input type="text" name="cod" placeholder="CD101" required>

      Asignatura: <input type="text" name="nom" placeholder="Programacion" required>

      Nota: <input type="number" name="nota" placeholder="99" required>

      <input type="submit" name="guardar" value="Guardar" class="btn btn-primary">
      </form>
      <hr>
      <h4><center>****Lista de Usuarios****</center></h4>
      <table class="table table-hover">
           <thead>
                  <tr>
                        <th>Nombre Completo</th>
                        <th>Usuario</th>
                        <th>Nota</th>
                        <th>Editar</th>
                        <th>Eliminar</th>                   
                  </tr>
           </thead>
           <tbody>
                    <?php                   
                      while($regalumnos=$resultadoalumnos->fetch_array(MYSQLI_BOTH)){
                         echo"<Tr>
                               <td>".$regalumnos['NombreA']."</td>
                               <td>".$regalumnos['NombreU']."</td>
                               <td>".$regalumnos['CorreoA']."</td>
                               <td><a href='#?id=".$regalumnos['IdUsuario']."'>Editar</a></td>
                               <td><a href='#?id=".$regalumnos['IdUsuario']."'>Eliminar</a></td>
                       </tr>";
                      }
                    ?>
                     
           </tbody> 
      </table>
  </div>
</div>


<hr>

<footer>
  <?php require_once("piedepagina.php"); ?>
</footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
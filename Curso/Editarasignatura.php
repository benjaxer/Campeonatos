<?php
include("conexion/conexionbd.php");
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

  <h3><center>Modificar Asignaturas</center></h3>
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
      Codigo: <input type="text" name="cod" value="<?php echo $filas['codigoasignatura'];?>">

      Asignatura: <input type="text" name="nom" value="<?php echo $filas['nombreasignatura'];?>">

      Nota: <input type="number" name="nota" value="<?php echo $filas['nota'];?>">
          <input type="hidden" name="ID" value="<?php echo $ID;?>">
          <input type="submit" name="editar" value="Modificar">
      </form>
    </div> 
<?php 
  if(isset($_REQUEST["editar"])){
    $cod=$_REQUEST["cod"];
    $materias=$_REQUEST["nom"];
    $nota=$_REQUEST["nota"];
    $id=$_REQUEST["ID"];
    $sqlModificar="UPDATE asignaturas SET codigoasignatura='$cod',
                                          nombreasignatura='$materias',
                                          nota='$nota'
                  WHERE idasignaturas='$id'";
                  
   $modificado=$conexion->query($sqlModificar);
   if($modificado>0){
        echo "<script>
        alert('Registro Modificado Exitosamente');
        window.location='index.php';
        </script>"; 
      }else{
        echo "<script>
        alert('Error al Modificar');
        window.location='index.php';
        </script>";
      }
  }
  $$conexion->close();
  ?>
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




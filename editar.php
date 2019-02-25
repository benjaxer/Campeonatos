<?php
include("conexion.php");
$id=$_GET['id'];
$sql="SELECT Idcampeonato,nombre,semana,tipocampeonato,goles,email
      FROM campeonato 
      WHERE Idcampeonato='$id'";
$resultado=$conexion->query($sql);
$filas=$resultado->fetch_assoc();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Jugadores</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" in tegrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
       <a class="navbar-brand" href="admin.php">Atras</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
 

	</ul>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
   
    </form>

  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
       <br>
      <h1 class="display-3">Modificar Jugadores</h1>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
  

<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control"  name="nom" value="<?php echo $filas['nombre'];?>">
    </div>

    <div class="form-group col-md-6">
      <label for="inputPassword4">Semana</label>
      <input type="text" class="form-control" name="sem" value="<?php echo $filas['semana'];?>">
      </div>

        <div class="form-group col-md-6">
      <label for="inputEmail4">Campeonato</label>
      <input type="text" class="form-control"  name="tcam" value="<?php echo $filas['tipocampeonato'];?>">
       </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Goles</label>
        <input type="number" name="gol" class="form-control" value="<?php echo $filas['goles'];?>">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Email</label>
        <input type="email" name="mail" class="form-control" value="<?php echo $filas['email'];?>">
   </div>
   <div>
    <input type="hidden" name="id" value="<?php echo $id;?>">
   </div>
 <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Modificar Jugador</button> 

</form>

  </div> <!-- /container -->
   <?php 
  if(isset($_POST["editar"])){
    $nombre=$_POST["nom"]; 
    $semana=$_POST["sem"];
    $tipocampeonato=$_POST["tcam"];
    $goles=$_POST["gol"];
    $email=$_POST["mail"];
    $ID=$_GET['id'];
    $sqlModificar="UPDATE campeonato SET nombre='$nombre',
                                         semana='$semana',
                                         tipocampeonato='$tipocampeonato',
                                         goles='$goles',
                                         email='$email'                         
                   WHERE Idcampeonato='$id'";
                                  
   $modificado=$conexion->query($sqlModificar);
   if($modificado>0){
    error_reporting(E_ALL);
ini_set('display_errors', 1);
        echo "<script>
        alert('Registro Modificado');
        window.location='admin.php';
        </script>";
      }else{
        echo "<script>
        alert('Error al Modificar');
        window.location='admin.php';
        </script>";
      }
  } 

  ?>

</main>

<footer class="container">

	</ul>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/bootstrap.bundle.min.js"></script>
 </body>
</html>


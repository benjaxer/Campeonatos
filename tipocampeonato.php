<?php
include("conexion.php");
if (!empty($_POST)) {
  $apodo = mysqli_real_escape_string($conexion, $_POST['nom']);
  $semanario = mysqli_real_escape_string($conexion,$_POST['sem']);
  $tcampeonato = mysqli_real_escape_string($conexion,$_POST['tcam']);
  $versujeto="SELECT Idcampeonato,nombre,semana,tipocampeonato
              FROM campeonato 
              WHERE nombre = '$apodo' OR
                    semana = '$semanario'
                    tipocampeonato = 'tcampeonato'";            

  $existepersona=$conexion->query($versujeto);
  $filas=$existepersona->num_rows;
  if ($filas>0){
    echo "<script>
        alert('Registro Modificado');
        window.location='admin.php';
        </script>";
      }else{
        $sqlpartido="INSERT INTO campeonato(nombre,semana,tipocampeonato)
                     VALUES('$apodo','$semanario','tcampeonato')";
        $resultado=$conexion->query($sqlpartido);
        if($resultado>0){
        echo "<script>
        alert('Registro Exitoso');
        window.location='admin.php';
        </script>";
        }else{
          echo "<script>
        alert('Error al Registrar');
        window.location='admin.php';
        </script>";
          }
      }
  }
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Registrar</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">


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
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
    <?php require_once("menusuperior3.php"); ?>
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
      <h1 class="display-3">Agregar Jugadores</h1>


    </div>
  </div>

 

    <hr>
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
    
   <center><div class="form-row"></center>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Agregar Campeonato</label>
        <input type="text" name="tcam" class="form-control"  placeholder="Campeonatos">
      </div>
     
      </div>
        <input type="hidden" name="ID" value="<?php echo $id;?>">
     <center><input type="submit" name="guardar" value="Agregar Campeonato"></center>
</form>
    <?php
    $sql="SELECT Idcampeonato,nombre,semana,tipocampeonato
      FROM campeonato"; 
    $resultado=$conexion->query($sql);
       while($registros=$resultado->fetch_array(MYSQLI_BOTH)){         
          }
  $conexion->close();
    ?>

  </div> <!-- /container -->

</main>

<footer class="container">

	</ul>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.2/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script></body>
</html>

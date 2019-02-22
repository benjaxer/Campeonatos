<?php
include("conexion.php");
 $sql="SELECT Idcampeonato,nombre,semana,tipocampeonato,goles,email
      FROM campeonato"; 
    $resultado=$conexion->query($sql);
    
?>
<!doctype html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
      <meta name="generator" content="Jekyll v3.8.5">
    <title>Campeonatos</title>

 <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <style type="text/css" class="init">

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
      <?php require_once("menusuperior2.php");?>
	  </ul>
    
    
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3">Lista de Jugadores!</h1>
    </div>
  </div>
<form>     
        
  </form>
<hr>
<table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead>
        <tr> 
            <th>IdPersona</th>
             <th>Nombre</th>
             <th>Semana</th>  
             <th>TipoC</th>
             <th>Goles</th> 
             <th>Email</th>  
             <th>Editar</th>
             <th>Eliminar</th>
        </tr>
          
   </thead>
   <tbody>
     <?php
       while($registros=$resultado->fetch_array(MYSQLI_BOTH)){
         echo"<Tr>
                <td>".$registros['Idcampeonato']."</td>
                <td>".$registros['nombre']."</td>
                <td>".$registros['semana']."</td>
                <td>".$registros['tipocampeonato']."</td>
                <td>".$registros['goles']."</td>
                <td>".$registros['email']."</td>
                <td><a href='editar.php?id=".$registros['Idcampeonato']."'>Editar</a></td>
                <td><a href='eliminar.php?id=".$registros['Idcampeonato']."'>Eliminar</a></td>
             </tr>";
          }
    ?>
   </tbody>
        <tfoot>
            <tr>
               <th>IdPersona</th>
             <th>Nombre</th>
             <th>Semana</th>  
             <th>TipoC</th>
             <th>Goles</th> 
             <th>Email</th>
             <th>Editar</th>
             <th>Eliminar</th>           
            </tr>
        </tfoot>
    </table>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
<?php require_once("piedepagina.php"); ?>
	
</footer>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


</body>
</html>

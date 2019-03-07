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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
  </head>
<script type="text/javascript">
   function ConfirmDelete()
   {
    var respuesta = confirm("Estas seguro que deseas Eliminar al Usuario?");

  if(respuesta == true)
  {
    return true;
  } 
  else
  {
     return false;
  }
}
 
</script>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="insertar.php">Agregar Jugadores</a>
      <a class="navbar-brand" href="index.php">Atras</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
	  </ul>
    
    
  </div>
</nav>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <br><br>
      <h1 class="display-3">Lista de Jugadores!</h1>

    </div>
  </div>

<hr>

  <div class="container-fluid">
  <div class="row">
  <div class="col-sm-1"></div>

  <div class="col-lg-10">
    <table id="example" class="table table-striped table-bordered" style="width:100%">


       <thead>
        <tr> 
            <th>IdPersona</th>
             <th>Nombre</th>
             <th>Semana</th>  
             <th>TipoC</th>
             <th>Goles</th> 
             <th>Email</th>
             <th>Opciones</th> 
                            
        
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
                <td><a href='editar.php?id=".$registros['Idcampeonato']."'<i class='fas fa-edit'></i></a>
                &nbsp &nbsp &nbsp;
                <a href='confirmar.php?id=".$registros['Idcampeonato']."'<i class='fas fa-trash' onclick='return ConfirmDelete()'></i></a></td>
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
             <th>Opciones</th>
                      
            </tr>
        </tfoot>
    </table>
  </div>
<div class="col-sm-1"></div>
</div>
</div>
   
<hr>
   <!-- /container -->

</main>

<footer class="container">
<?php require_once("piedepagina.php"); ?>
	
</footer>


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js">
</script>

  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">   
  </script>

  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>


</body>
</html>

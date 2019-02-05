<?php
include("conexion/conexionbd.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(!empty($_POST)){
	$codigo=$_POST['cod'];
	$asignatura=$_POST['nom'];
  $nota=$_POST['nota'];
  $vermaterias="SELECT idasignaturas,codigoasignatura,nombreasignatura,nota
                  FROM asignaturas
                  WHERE codigoasignatura='$codigo' OR
                        nombreasignatura='$asignatura'";
    $existemateria=$conexion->query($vermaterias);
    $filas=$existemateria->num_rows;
    if($filas>0){
    	echo"La Asignatura ya Existe";   	    
    }else{
    	$sqlmateria="INSERT INTO asignatura(
    	                  codigoasignatura,nombreasignatura,nota)
    	                  VALUES('$codigo','$asignatura',$nota)";
      $resultadomateria=$conexion->query($sqlmateria);
      if($resultadomateria>0){
       	  echo "<script>
        alert('Registro Exitoso');
        window.location='index.php';
        </script>";
      }else{
       	  echo"<script>
        alert('Error al Registrar');
        window.location='index.php';
        </script>";
       }
    }
}
$materias="SELECT idasignaturas,codigoasignatura,nombreasignatura,nota
                  FROM asignaturas";
$resultadomateria=$conexion->query($materias);
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Asignaturas</title>
</head>
<body>
<h3><center>Registro de Asignaturas</center></h3>
<form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
      Codigo: <input type="text" name="cod" placeholder="CD101" required>

      Asignatura: <input type="text" name="nom" placeholder="Programacion" required>

      Nota: <input type="number" name="nota" placeholder="99" required>

      <input type="submit" name="guardar" value="Guardar" required>
      </form>
      <hr>
      <h4><center>****Mis Asignaturas****</center></h4>
      <table border="1">
           <thead>
                  <tr>
                        <th>Codigo</th>
                        <th>Asignatura</th>
                        <th>Nota</th>
                        <th>Editar</th>
                        <th>Eliminar</th>                   
                  </tr>
           </thead>
           <tbody>
                    <?php
                      while($regmaterias=$resultadomateria->fetch_array(MYSQLI_BOTH)){
                         echo"<Tr>
                               <td>".$regmaterias['codigoasignatura']."</td>
                               <td>".$regmaterias['nombreasignatura']."</td>
                               <td>".$regmaterias['nota']."</td>
                               <td><a href='Editarasignatura.php?id=".$regmaterias['codigoasignatura']."'>Editar</a></td>
                               <td><a href='Eliminarasignatura.php?id=".$regmaterias['codigoasignatura']."'>Eliminar</a></td>
                       </tr>";
                      }
                    ?>
                     
           </tbody> 
      </table>
      </body>
      </html>
<?php
include("conexion.php");
if (!empty($_POST)) {
  $apodo = mysqli_real_escape_string($conexion, $_POST['nom']);
  $semanario = mysqli_real_escape_string($conexion,$_POST['sem']);
  $versujeto="SELECT Idcampeonato,nombre,semana 
              FROM campeonato 
              WHERE nombre = '$apodo' OR
                    semana = '$semanario'";            

  $existepersona=$conexion->query($versujeto);
  $filas=$existepersona->num_rows;
  if ($filas>0){
    echo "<script>
        alert('Registro Modificado');
        window.location='index.php';
        </script>";
      }else{
        $sqlpartido="INSERT INTO campeonato(nombre,semana)
                     VALUES('$apodo','$semanario')";
        $resultado=$conexion->query($sqlpartido);
        if($resultado>0){
        echo "<script>
        alert('Registro Exitoso');
        window.location='index.php';
        </script>";
        }else{
          echo "<script>
        alert('Error al Registrar');
        window.location='index.php';
        </script>";
          }
      }
  }
  ?>
<!DOCTYPE html>
<html>
<head>  
   <meta charset="utf-8">
   <title>Registrar</title>
</head>
<body>  
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
          
      Nombre: <input type="text" name="nom" placeholder="Nombres"> <br></br>
      Semana: <input type="text" name="sem"  placeholder="Semana"><br></br>
     <input type="hidden" name="ID" value="<?php echo $id;?>">
        <input type="submit" name="guardar" value="Agregar jugador">
        
    </form>
    <?php
    $sql="SELECT Idcampeonato,nombre,semana 
      FROM campeonato"; 
    $resultado=$conexion->query($sql);
       while($registros=$resultado->fetch_array(MYSQLI_BOTH)){         
          }
  $conexion->close();
    ?>

</body>
</html> 
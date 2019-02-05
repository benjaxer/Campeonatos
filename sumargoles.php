    $jugador = $existepersona->fetch_array(MYSQLI_BOTH);

//sumar goles
$sumagoles = ($jugador['goles'] + $tiros);
//if(isset($_REQUEST["editar"])){
    $apodo=$_REQUEST["nom"];
    $semanario=$_REQUEST["sem"];
    $tcampeonato=$_REQUEST["tcam"];
    $tiros=$_REQUEST["gol"];
    $id=$_REQUEST["ID"];
    $update="UPDATE campeonato SET goles='$sumagoles'          
                WHERE nombre = '$apodo' AND
                      semana = '$semanario' AND
                      tipocampeonato = '$tcampeonato' AND          
                      email = '$correo'";
  
  $existepersona=$conexion->query($update); 


  
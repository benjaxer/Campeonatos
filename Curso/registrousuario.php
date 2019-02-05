 <?php
include("conexion/conexionbd.php");
$sql = "SELECT IdTipousuario, TipoUsuario FROM tipo_usuario";
$resultado = $conexion->query($sql);

if (!empty($_POST)) {
	$nombre = mysqli_real_escape_string($conexion, $_POST['nombrealumno']);
	$usuario = mysqli_real_escape_string($conexion, $_POST['user']);
	$genero = $_POST['genero'];
	$tipouser = $_POST['tipo_user'];
	$tel = mysqli_real_escape_string($conexion, $_POST['telefono']);
	$correo = mysqli_real_escape_string($conexion, $_POST['email']);
	$password = mysqli_real_escape_string($conexion, $_POST['pass']);
	$password_encriptada = sha1($password);
	$sqluser ="SELECT IdUsuario FROM usuarios WHERE NombreU ='$usuario' ";
	$resultadouser = $conexion->query($sqluser);
	$filas = $resultadouser->num_rows;
	if ($filas>0) {
		echo "<script> alert('El usuario ya existe ');
		window.location='registrousuario.php';
		</script>";
	}else{
		$sqlalumno = "INSERT INTO alumno(NombreA, TelefonoA, GeneroA, CorreoA)
		VALUES('$nombre', '$tel','$genero','$correo')";
		$resultadoAlumno =$conexion->query($sqlalumno);
		$idalumno = $conexion->insert_id;

		$sqlusuario = "INSERT INTO usuarios(NombreU,PasswordU,IdAlumno,IdTipoUsuario) VALUES('$usuario','$password_encriptada','$idalumno','$tipouser')";
		$resultadousuario =$conexion->query($sqlusuario);
		if($resultadousuario>0){
			echo "<script> alert('Registro Exitoso');
					window.location='index.php';
			</script>";
		}else{
			echo "<script> alert('Error al Registrarse');
					window.location='registrousuario.php';
			</script>";
		}

	}

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content=" CRUD en PHP y Mysql - Registro de usuarios y asignaturas">
<meta name="author" content="Jairo Galeas">
<link rel="icon" href="../../../../favicon.ico">

<title>Registro de usuarios</title>

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
</ul>

</div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3">Crear Cuenta</h1>
		<form action=" <?php $_SERVER["PHP_SELF"]; ?> " method="POST">
			 <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputNombreA" class="col-form-label">Nombre del Alumno</label>
				      <input type="text" class="form-control" id="inputNombreA" placeholder="Nombre Completo" name="nombrealumno">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputUser" class="col-form-label">Usuario</label>
				      <input type="text" class="form-control" id="inputUser" placeholder="Nombre de Usuario" name="user">
				    </div>
			  </div>
			   <div class="form-row">
				      <label for="TipoUser">Tipo de Usuario</label>
					    <select class="form-control" id="TipoUser" name="tipo_user">
					     <?php
					     	while ($fila = $resultado->fetch_assoc()) {  ?>
					     		<option value=" <?php echo $fila['IdTipousuario'];?> "><?php echo $fila['TipoUsuario']; ?> </option>
					      <?php 	}
					     ?>
					    </select>
			 </div>
			  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputTelefono" class="col-form-label">Telefono</label>
				      <input type="tel" class="form-control" id="inputTelefono" placeholder="Numero de Telefono" name="telefono">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="exampleFormControlSelect1">Genero</label>
					    <select class="form-control" id="exampleFormControlSelect1" name="genero">
					      <option>Femenino</option>
					      <option>Masculino</option>

					    </select>
				    </div>
			  </div>
			 <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputEmail4" class="col-form-label">Email</label>
				      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputPassword4" class="col-form-label">Password</label>
				      <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="pass">
				    </div>
			  </div>

			  <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
			</form>

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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="../../../../assets/js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
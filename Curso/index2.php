<?php
include("conexion/conexionbd.php");
session_start();
if (isset($_SESSION['id_usuario'])) {
	header("Location: admin.php");
}
if (!empty($_POST)) {
	$usuario = mysqli_real_escape_string($conexion, $_POST['user']);
	$password = mysqli_real_escape_string($conexion, $_POST['pass']);
	$password_encriptada = sha1($password);
	$sql="SELECT IdUsuario,IdTipousuario FROM usuarios WHERE NombreU = '$usuario' AND PasswordU = '$password_encriptada'";
	$resultado = $conexion->query($sql);
	$filas = $resultado->num_rows;
	if ($filas>0) {
		$fila=$resultado->fetch_assoc();
		$_SESSION['id_usuario']=$fila['IdUsuario'];
		$_SESSION['tipo_usuario']=$fila['IdTipousuario'];
		header("Location: admin.php");
	}else{
		echo "<script> alert('Usuario o Password son incorrectos ');
		window.location='index.php';
		</script>";
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

	<title>Sistema</title>
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
	<form class="form-inline my-2 my-lg-0" action=" <?php $_SERVER["PHP_SELF"]; ?> " method="POST">
		<a href="registrousuario.php" >Crear cuenta</a>
		<input class="form-control mr-sm-2" type="text" placeholder="Nombre Usuario" aria-label="user" name="user" >
		<input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="pass" name="pass">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="ingresar"  >Ingresar</button>
	</form>
      </div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3">Hello, world!</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
	</div>
</div>
<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
		</div>
		<div class="col-md-4">
			<h2>Heading</h2>
			<p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
			<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
		</div>
		<div class="col-md-4">
			<h2>Heading</h2>
			<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
			<p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
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
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

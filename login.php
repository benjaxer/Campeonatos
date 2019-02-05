<!DOCTYPE html>
<html lang="en">
<head> 
     <meta charset="UTF-8">
     <title>Login CRUD</title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
       <input type="text" name="nom" placeholder="Nombre Usuario">
       <input type="password" name="apellido" placeholder="Password">
       <input type="password" name="apellidos" placeholder="Password">
       <input type="submit" name="ingresar" value="Ingresar">
       <br><a href="registrousuario.php">Crear Cuenta</a>
</form>
</body>
</html>
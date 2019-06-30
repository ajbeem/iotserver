<?php
ini_set("session.cookie_lifetime", "21600");
session_start();
date_default_timezone_set('America/Mexico_city');
$fechaActual = date("d-m-Y");
$horaActual = date("H:i:s");
/*session_start();
if(isset($_SESSION['ID_admin'])){
	$idUsuario = $_SESSION['ID_admin'];
}else{
	header("location:../indexAdministradores.php?mensaje=sesionEnded");
}*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Formulario de activaci&oacute;n de promoci&oacute;n</title>
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/toastr.css">
<!-- jQuery library -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="../js/toastr.js"></script>

</head>

<body>
    <header>
        <div class="w3-bar w3-border w3-card-4 w3-deep-purple">
        <a href="https://www.pcentaury.com" class="w3-bar-item w3-button">Proxima Centaury</a>
        <a href="./form_registro_managers.php" class="w3-bar-item w3-button">Alta de Administradores</a>
        <a href="./form_registro_usuarios.php" class="w3-bar-item w3-button">Alta de Usuarios</a>
        <a href="#" class="w3-bar-item w3-button">Modificaci&oacute;n de Datos de Promotores</a>
        </div> 
    </header>
    <div class="container">
  <h2>Card Image</h2>
  <p>Image at the top (card-img-top):</p>
  <div class="card" style="width:400px">
    <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>

</div>
    
</body>
</html>
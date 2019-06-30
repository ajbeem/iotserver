<?php
$hrEntrada = $_GET['hr_entrada'];
ini_set("session.cookie_lifetime", "21600");
session_start();
if(isset($_GET['mensaje'])){
    $mensaje = $_GET['mensaje'];
}else{
    $mensaje = '';
}

date_default_timezone_set('America/Mexico_city');
$fechaActual = date("d-m-Y");
$horaActual = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Administradores</title>
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
        <div class="text-center">
            <h1>Bienvenido</h1>
            <p>Iniciar sesi&oacute;n</p>
            <h3><?=$mensaje?></h3>
        </div>
        <form action="./php/loginAdministradores.php" method="post">
            <div class="form-group">
                <label for="cmpHrEntrada" class="control-label">Hora de entrada: <?=$hrEntrada?>  </label>
                <input type="text" name="cmpHrEntrada" id="cmpHrEntrada" readonly value="<?=$hrEntrada?>" hidden>
            </div>
            <div class="form-group">
                <label for="cmpNusuario" class="control-label">Usuario</label>
                <input type="text" class="form-control" name="cmpNusuario" id="cmpNusuario" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="cmpPassword" class="control-label">Contrase&ntilde;a</label>
                <input type="password" name="cmpPassword" class="form-control" placeholder="Contrase&ntilde;a">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right">Entrar</button>
            </div>
        </form>
    </div>
</div>
    
</body>
</html>
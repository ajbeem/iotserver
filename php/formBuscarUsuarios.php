<?php
$mensaje = '';
$hrEntrada = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="../js/toastr.js"></script>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Bienvenido</h1>
            <p>Iniciar sesi&oacute;n</p>
            <h3><?= $mensaje ?></h3>
        </div>
        <form method="post" action="./buscarUsuarios.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="cmpHrEntrada" class="control-label">Hora de entrada: <?= $hrEntrada ?> </label>
                <input type="text" name="cmpHrEntrada" id="cmpHrEntrada" readonly value="<?= $hrEntrada ?>" hidden>
            </div>
            <div class="form-group">
                <label for="cmpNusuario" class="control-label">Usuario: </label>
                <input type="text" class="form-control" name="cmpNusuario" id="cmpNusuario" placeholder="Usuario">
            </div>
            <div class="form-group">
                <label for="pwd">Contrase&ntilde;a</label>
                <input type="password" class="form-control" name="cmpPassword" id="cmpPassword" placeholder="Password" required>
                <span id="verPswd" style="cursor:pointer;" i class="fa fa-eye-slash"></i></span>
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-primary" id="loginUsuarioJSON" name="loginUsuarioJSON" value="Ingresar" class="form-control">
            </div>
        </form>
    </div>
</body>
<script src="../js/loginUsersJSON.js"></script>
<script>
    $(document).ready(function() {

        $('#verPswd').mousedown(function() {
            $('#cmpPassword').removeAttr("type", "password");
        });

        $('#verPswd').mouseup(function() {
            $('#cmpPassword').attr("type", "password");
        });
    });
</script>

</html>
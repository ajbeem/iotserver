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
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="./js/toastr.js"></script>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>Bienvenido</h1>
            <p>Iniciar sesi&oacute;n</p>
            <h3><?= $mensaje ?></h3>
        </div>
        <form action="./php/login.php" method="post">
            <div class="form-group">
                <label for="cmpHrEntrada" class="control-label">Hora de entrada: <?= $hrEntrada ?> </label>
                <input type="text" name="cmpHrEntrada" id="cmpHrEntrada" readonly value="<?= $hrEntrada ?>" hidden>
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
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <i class='fas fa-gas-pump' style='font-size:56px;color:blue'></i>
                        </td>
                        <td>
                            <i class='fas fa-oil-can' style='font-size:56px;color:red'></i>
                        </td>
                        <td>
                            <i class='fas fa-tachometer-alt' style='font-size:56px;color:green'></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class='fas fa-car-battery' style='font-size:56px; color: blueviolet'></i>
                        </td>
                        <td>
                            <i class='fas fa-thermometer-half' style='font-size:56px;color:darkslateblue'></i>
                        </td>
                        <td></td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
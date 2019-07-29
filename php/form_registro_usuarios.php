<?php
session_start();
if (isset($_SESSION['IDusuarioAdministrador'])) {
    $idUsuarioAdministrador = $_SESSION['IDusuarioAdministrador'];
} else {
    header("location:../index.php?mensaje=sesionEnded");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALTA USUARIOS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- <link rel="stylesheet" href="estilos-formulario.css"> <script src="../js/enviarDatos.js"></script>-->
    <script src="../js/toastr.js"></script>
</head>

<body>
    <div class="container">
        <!--FORM por submit
        <form name="formularioRegistroPromotores" method="post" action="./altaClientes.php" enctype="multipart/form-data"-->
        <!--FORM por JS-->
        <form name="formularioRegistroClientes" method="post" action="#" enctype="multipart/form-data">
            <h2>Modulo de Alta de Clientes(as)</h2>
            <div class="form-group">
                <label for="cmpUsuarioAdministrador">Usuario Administrador:</label>
                <input type="text" name="cmpUsuarioAdministrador" id="cmpUsuarioAdministrador" class="form-control" value="<?= $idUsuarioAdministrador ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cmpNusuario">Nombre de usuario:</label>
                <input type="text" name="cmpNusuario" id="cmpNusuario" class="form-control" placeholder="Nick Name" required>            
            </div>
            <div class="form-group">
                <label for="pwd">Contrase&ntilde;a</label>
                <input type="password" class="form-control" name="cmpPassword" id="cmpPassword" placeholder="Password" required>
                <span id="verPswd" style="cursor:pointer;" i class="fa fa-eye-slash"></i></span>
            </div>
            <div class="form-group">
                <label for="cmpCorreoElectronico">Correo Electronico:</label>
                <input type="email" name="cmpCorreoElectronico" id="cmpCorreoElectronico" class="form-control" placeholder="E-Mail" required>
            </div>
            <div class="form-group">
                <input type="button" class="btn btn-success" id="salvarRegistroUsuarioJSON" name="salvarRegistroUsuarioJSON" value="Enviar mis Datos" class="form-control">
            </div>
        </form>
    </div>

    <script src="../js/altaUsuarios.js"></script>
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

</body>

</html>
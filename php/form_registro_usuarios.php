<?php
session_start();
if(isset($_SESSION['IDusuario'])){
	$idUsuario = $_SESSION['IDusuario'];
}else{
	header("location:../returned.index.php?mensaje=sesionEnded");
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
        <form name="formularioRegistroPromotores" method="post" action="./altaPromotores.php" enctype="multipart/form-data"-->

        <!--FORM por JS-->
        <form name="formularioRegistroPromotores" method="post" action="#" enctype="multipart/form-data"-->
            <h2>Modulo de Alta de Promotores(as)</h2>
            <div class="form-group">
                <label for="cmpUsuarioAdministrador">Usuario Administrador:</label>
                <input type="text" name="cmpUsuarioAdministrador" id="cmpUsuarioAdministrador" class="form-control" value="<?=$idUsuario?>" readonly>
            </div>
            <div class="form-group">
                <label for="cmpNombreCompleto">Nombre Completo:</label>
                <input type="text" name="cmpNombreCompleto" id="cmpNombreCompleto" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group">
                <label for="cmpCorreoElectronico">Correo Electronico:</label>
                <input type="email" name="cmpCorreoElectronico" id="cmpCorreoElectronico" class="form-control" placeholder="E-Mail" required>
            </div>
            
            <div class="form-group">
                <label for="cmpNusuario">Nombre de usuario:</label>
                <input type="text" name="cmpNusuario" id="cmpNusuario" class="form-control" placeholder="Nick Name" required>
            </div>
            <div class="form-group">
                <label for="pwd">Contrase&ntilde;a</label>
                <input type="password" class="form-control" name="cmpPassword" id="cmpPassword" placeholder="Password" required>
                <span id="verPswd" style="cursor:pointer;"i class="fa fa-eye-slash"></i></span>
            </div>
            <h3>Datos Adicionales</h3>
            <div class="form-group">
                <label for="cmpCIUDAD">Ciudad:</label>
                <input type="text" name="cmpCIUDAD" id="cmpCIUDAD" class="form-control" placeholder="Ciudad" required>
            </div>
            <div class="form-group">
                <label for="cmpESTADO">Estado:</label>
                <input type="text" name="cmpESTADO" id="cmpESTADO" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="cmpZONA">ZONA:</label>
                <input type="text" name="cmpZONA" id="cmpZONA" class="form-control" placeholder="Zona" required>
            </div>

            <div class="form-group">
                <label for="cmpTELEFONO">Telefono:</label>
                <input type="text" name="cmpTELEFONO" id="cmpTELEFONO" class="form-control" placeholder="Celular" required>
            </div>
            <div class="form-group">
                <label for="cmpCURP">CURP:</label>
                <input type="text" name="cmpCURP" id="cmpCURP" class="form-control" placeholder="CURP" required>
            </div>
            <div class="form-group">
                <label for="cmpRFC">RFC:</label>
                <input type="text" name="cmpRFC" id="cmpRFC" class="form-control" placeholder="RFC" required>
            </div>
            <div class="form-group">
                <label for="cmpNSS">N&uacute;mero de Seguro Social:</label>
                <input type="text" name="cmpNSS" id="cmpNSS" class="form-control" placeholder="IMSS" required>
            </div>
            <div class="form-group">
                <label for="cmpTELCASA">Telefono de Casa:</label>
                <input type="text" name="cmpTELCASA" id="cmpTELCASA" class="form-control" placeholder="Telefono local" required>
            </div>
            <div class="form-group">
                <label for="cmpNUM_EMERGENCIA">Telefono de Emergencias:</label>
                <input type="text" name="cmpNUM_EMERGENCIA" id="cmpNUM_EMERGENCIA" class="form-control" placeholder="Telefono para Emergencias" required>
            </div>
            <div class="form-group">
                <label for="cmpDOMICILIO">Domicilio:</label>
                <input type="text" name="cmpDOMICILIO" id="cmpDOMICILIO" class="form-control" placeholder="Calle y n&uacute;mero" required>
            </div>
            <div class="form-group">
                <label for="cmpSISTEMA_OPERATIVO">Sistema Operativo:</label>
                <input type="text" name="cmpSISTEMA_OPERATIVO" id="cmpSISTEMA_OPERATIVO" class="form-control" placeholder="Android - IOS" required>
            </div>

            <!--div class="form-control"><label for=""></label></div-->
            <div class="form-group">
                <input type="button" class="btn btn-success" id="salvarRegistroPromotor" name="salvarRegistroPromotor" value="Enviar mis Datos" class="form-control">
            </div>
        </form>
    </div>

    <script src="../js/altaUsuarios.js"></script>
    <script>
    $(document).ready(function(){

        $('#verPswd').mousedown(function(){
            $('#cmpPassword').removeAttr("type", "password");
        });

        $('#verPswd').mouseup(function(){
            $('#cmpPassword').attr("type", "password");
        });
    });
    </script>

</body>

</html>
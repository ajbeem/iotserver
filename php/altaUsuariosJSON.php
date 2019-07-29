<?php
require_once './conexionPDO_Usuarios.php';
/*CONECTAR A LA BASE DE DATOS 
cmpUsuarioAdministrador, cmpNusuario, cmpPassword, cmpCorreoElectronico
usuarioAdministrador, nUsuario, password, correoElectronicoUsuario*/
//Datos JSON AJAX
$json = file_get_contents('php://input');
$fechaActual = date("d-m-Y");

if ($json != null) {
    $id = 0;
    $objjson = json_decode($json);
    $administrador = $objjson->usuarioAdministrador;
    $user = $objjson->nUsuario;
    $pass = $objjson->password;
    $eMail = $objjson->correoElectronicoUsuario;    
    $serverResponse = array();
    $cryptPassword = password_hash($pass, PASSWORD_DEFAULT);
    $obj1 = new ConexionPDO();
    try {
        $cnx = $obj1->conectar();
        $sql0 = $cnx->prepare('SELECT nombreUsuario FROM u538442363_yzyju.Clientes 
        WHERE nombreUsuario = :cmpNombreUsuario;');
        $sql0->bindParam(':cmpNombreUsuario', $username);
        $sql0-> execute();
        $result = $sql0->fetch(PDO::FETCH_ASSOC);
        if ($result > 0) {
            $serverResponse['answer'] = "El usuario ya esta registrado, solicite Modificacion de Datos";
        } else {
            //echo "Datos recibidos";       
            $sql= $cnx->prepare("INSERT INTO u538442363_yzyju.Clientes 
            (ID, nombreUsuario,	pswd, eMail, creadoPor)
            VALUES 
            (:cmpId, :cmpNombreUsuario, :cmpContra, :cmpMail, :cmpAdministrador);");
            $sql->bindParam(':cmpId', $id);
            $sql->bindParam(':cmpNombreUsuario', $username);
            $sql->bindParam(':cmpContra', $cryptPassword);
            $sql->bindParam(':cmpMail', $eMail);
            $sql->bindParam(':cmpAdministrador', $administrador);
            if ($sql->execute()) {
                $serverResponse['answer'] = "registroCorrecto";
                $serverResponse['message'] = "Proceso Terminado";
                $sql->closeCursor();
            } else {
                $serverResponse['answer'] = 'NO_registrado';
                $serverResponse['message'] = "NO se pudieron agregar los datos error de conexión a BDD";
                $sql->closeCursor();
            }
        }
    } catch (Exception $e) {
        $serverResponse['answer'] = 'NO_registrado';
        $serverResponse['message'] = 'Excepcion capturada al Almacenar los datos nuevos: '.$e->getMessage();
    } finally{
        $sql0->closeCursor();
        $cnx= null;
        echo json_encode($serverResponse);
    }
} else {
    $serverResponse['answer'] = 'NO_registrado';
    $serverResponse['message'] = "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
    echo json_encode($result);
}

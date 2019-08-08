<?php
require_once './conexionPDO_Usuarios.php';
$json = file_get_contents('php://input');
$fechaActual = date("d-m-Y");
if ($json != null) {
    $objjsonUser = json_decode($json);
    $user = $objjsonUser->nUsuario;
    $pass = $objjsonUser->pswd;
    //nUsuario, password
    $serverResponse = array();
    $obj = new ConexionPDO();
    #region Try catch Block get data
        try {
            $cnx = $obj->conectar();
            $sql = $cnx->prepare('SELECT pswd FROM u538442363_yzyju.Clientes 
            WHERE nombreUsuario = :cmpNombreUsuario;');
            $sql->bindParam(':cmpNombreUsuario', $user);
            if ($sql->execute()) {
                $resultset = $sql->fetch(PDO::FETCH_ASSOC);
                if ($resultset == null) {
                    $serverResponse["answer"] = "NO SE ENCONTRO AL USUARIO";
                    $serverResponse['user'] =  $user;
                } else {
                    if (password_verify($pass, $resultset['pswd'])) {
                        ini_set("session.cookie_lifetime","36000"); 
                        session_start();
                        $serverResponse["answer"] = "ok";
                        $serverResponse['user'] =  $user;
                    } else {
                        $serverResponse["answer"] = "PASSWORD INCORRECTO INTENTELO NUEVAMENTE";
                    }
                }
            } else {
                $serverResponse["answer"] = "No se pudo realizar la consulta";
            }
        } catch (Exception $e) {
            $serverResponse["answer"] = 'Excepción capturada al conectar con BDD: ' . $e->getMessage();
        } finally {
            $sql->closeCursor();
            $cnx = null;
            echo json_encode($serverResponse);
        }
    #end region
} else {
    $serverResponse["answer"] =  "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
    echo json_encode($serverResponse);
}

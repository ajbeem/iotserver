<?php
require_once './conexionPDO_Usuarios.php';
if (isset($_POST['nUsuario'])) {
    $user = htmlentities(addslashes($_POST['nUsuario']));
    $pass = htmlentities(addslashes($_POST['pswd']));
    $serverResponse = array();
    $obj = new ConexionPDO();
    try {
        $cnx = $obj->conectar();
        $sql = $cnx->prepare('SELECT pswd  FROM u538442363_yzyju.Clientes 
        WHERE nombreUsuario = :cmpNombreUsuario;');
        $sql->bindParam(':cmpNombreUsuario', $user);
        if ($sql->execute()) {
            $resultset = $sql->fetch(PDO::FETCH_ASSOC);
            if ($resultset == null) {
                $serverResponse["answer"] = "NO SE ENCONTRO AL USUARIO";
                $serverResponse['user'] =  $user;
            } else {
                if (password_verify($pass, $resultset['pswd'])) {
                    //ini_set("session.cookie_lifetime","36000"); 
                    //session_start();
                    $serverResponse["answer"] = "usuarioAutenticado";
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
} else {
    $serverResponse["answer"] =  "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
    echo json_encode($serverResponse);
}
?>
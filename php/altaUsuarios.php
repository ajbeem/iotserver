<?php
require_once './conexionPDO_Usuarios.php';
/*CONECTAR A LA BASE DE DATOS 
'usuarioAdministrador',  'nUsuario', 'password', 'correoElectronicoUsuario'
usuarioAdministrador, nUsuario, password, correoElectronicoUsuario
*/
//Datos por JS AJAX
if (array_key_exists('nUsuario', $_REQUEST)) {
    $id = 0;
    $administrador = $_REQUEST['usuarioAdministrador'];
    $username = $_REQUEST['nUsuario'];
    $password = $_REQUEST['password'];
    $cryptPassword = password_hash($password, PASSWORD_DEFAULT);
    $eMail = $_REQUEST['correoElectronicoUsuario'];

    $obj1 = new ConexionPDO();
    try {
        $cnx = $obj1->conectar();
        $sql0 = $cnx->prepare('SELECT nombreUsuario FROM Clientes 
        WHERE nombreUsuario = :cmpNombreUsuario;');
        $sql0->bindParam(':cmpNombreUsuario', $username);
        $sql0-> execute();
        $result = $sql0->fetch(PDO::FETCH_ASSOC);
        if ($result > 0) {
            echo "El usuario ya esta registrado, solicite Modificacion de Datos";
        } else {
            echo "Datos recibidos";
            /*$sql = $cnx->prepare("INSERT INTO Clientes 
            (id, nombreUsuario, pswd, eMail, creadoPor)
            VALUES 
            (:cmpId, :cmpNombreUsuario, :cmpContra, :cmpMail, cmpAdministrador);");
            $sql->bindParam(':cmpId', $id);
            $sql->bindParam(':cmpNombreUsuario', $username);
            $sql->bindParam(':cmpContra', $cryptPassword);
            $sql->bindParam(':cmpMail', $eMail);
            $sql->bindParam(':cmpAdministrador', $administrador);
            if ($sql->execute()) {
                echo "registroCorrecto";
            } else {
                exit("no se pudieron agregar los datos error de conexión a BDD");
            }*/
        }
    } catch (Exception $e) {
        echo 'Excepci&oacute;n capturada al Almacenar los datos nuevos: ',  $e->getMessage(), "\n";
    } finally{
        //$sql->closeCursor();
        $sql0->closeCursor();
        $cnx= null;
    }
} else {
    echo "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
}

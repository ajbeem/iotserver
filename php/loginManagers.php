<?php
require_once './conexionPDO_Usuarios.php';
//Datos por JS AJAX
if(isset ($_POST['cmpNusuario'])){
    $hr_entrada = $_POST['cmpHrEntrada'];
    ini_set("session.cookie_lifetime","36000"); 
    session_start();
    $username=htmlentities(addslashes($_POST['cmpNusuario']));
    $password=htmlentities(addslashes($_POST['cmpPassword']));
    $nRows = 0;
    //$eMail = $_POST['cmpCorreoElectronico'];
    $obj1 = new ConexionPDO();
    try {
        $cnx = $obj1->conectar();
        $sql = $cnx->prepare("SELECT pswd FROM managers WHERE userName = :nombreUsr;");
        $sql->bindValue( ':nombreUsr', $username);
        $resultset = $sql -> execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $result['pswd'])) {
            $sql->closeCursor();
            $cnx = null; 
            $_SESSION["IDusuario"] = $username;
            $sql->closeCursor();
            $cnx = null;
            header("location:./indexAdministradores.php?id=$id&hr_entrada=$hr_entrada");
        } else {
            $sql->closeCursor();
            $cnx = null;
            $mensaje= "PASSWORD_INCORRECTO_INTENTELO_NUEVAMENTE";
            header("location:./login.php?id=$id&msg=Usuario%20o%20Password%20Incorrecto");
        }
    } catch (Exception $e) {
        $sql->closeCursor();
        $cnx = null;
        echo 'Excepción capturada al conectar en el servidor con la BDD: ',  $e->getMessage(), "\n";
    }
} else {
    echo "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
}
?>
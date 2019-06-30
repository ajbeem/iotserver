<?php
require_once './conexionPDO_Administradores.php';
/*CONECTAR A LA BASE DE DATOS */

//Datos por JS AJAX
if (array_key_exists('nombreCompleto', $_REQUEST)){
    $id = 0;
    $nombreCompleto = $_REQUEST['nombreCompleto'];
    $username=$_REQUEST['nUsuario'];
    $password=$_REQUEST['password'];
    $crypPswd = password_hash($password, PASSWORD_DEFAULT);
    $eMail = $_REQUEST['correoElectronico'];
    $obj1= new ConexionPDO();
    //nombreCompleto, nUsuario, password, correoElectronico
    try{
        $cnx = $obj1->conectar();
        //$cveActv= uniqid();
        $sql= $cnx->prepare("INSERT INTO u538442363_yzyju.managers (id, userName, pswd, nombreCompleto, eMail)
        VALUES (:id, :nombreUsuario, :contra, :nombrePromotor, :correo);");

        $sql->bindParam(':id', $id);
        $sql->bindParam(':nombreUsuario', $username);
        $sql->bindParam(':contra', $crypPswd);
        $sql->bindParam(':nombrePromotor', $nombreCompleto);
        $sql->bindParam(':correo', $eMail);
        if ($sql->execute()) {
            $idRegistrado = $cnx-> lastInsertId();
            echo "registroCorrecto";          
          }else {
             exit("no se pudieron agregar los datos error de conexión a BDD");
         }
         $sql->closeCursor();
         $cnx=null;
     } catch (Exception $e) {
         $sql->closeCursor();
         $cnx=null;
         echo 'Excepción capturada al conectar: ',  $e->getMessage(), "\n";
     }

}else{
    echo "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
}

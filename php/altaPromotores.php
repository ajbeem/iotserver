<?php
require_once './conexionPDO_Promotores.php';
/*CONECTAR A LA BASE DE DATOS */

//Datos por JS AJAX
if (array_key_exists('nombreCompletoPromotor', $_REQUEST)) {
    $id = 0;
    $administrador = $_REQUEST['usuarioAdministrador'];
    $nombreCompleto = $_REQUEST['nombreCompletoPromotor'];
    $username = $_REQUEST['nUsuario'];
    $password = $_REQUEST['password'];
    $eMail = $_REQUEST['correoElectronicoPromotor'];
    $CIUDAD = $_REQUEST['CIUDAD'];
    $ESTADO = $_REQUEST['ESTADO'];
    $ZONA = $_REQUEST['ZONA'];
    $TELEFONO = $_REQUEST['TELEFONO'];
    $CURP = $_REQUEST['CURP'];
    $RFC = $_REQUEST['RFC'];
    $NSS = $_REQUEST['NSS'];
    $TELCASA = $_REQUEST['TELCASA'];
    $NUM_EMERGENCIA = $_REQUEST['NUM_EMERGENCIA'];
    $DOMICILIO = $_REQUEST['DOMICILIO'];
    $SISTEMA_OPERATIVO = $_REQUEST['SISTEMA_OPERATIVO'];

    $obj1 = new ConexionPDO();
    try {
        $cnx = $obj1->conectar();
        $sql0 = $cnx->prepare('SELECT nombreCompleto, userName FROM vybcommx_empleados.personal 
        WHERE userName = :nombreUsuario OR nombreCompleto = :nombrePromotor;');
        $sql0->bindParam(':nombreUsuario', $username);
        $sql0->bindParam(':nombrePromotor', $nombreCompleto);
        $sql0-> execute();
        $result = $sql0->fetch(PDO::FETCH_ASSOC);

        if ($result > 0) {
            $sql0->closeCursor();
            $cnx= null;
            echo "El usuario ya esta registrado, ingrese al modulo de Modificacion de Datos";
        } else {
            $sql = $cnx->prepare("INSERT INTO vybcommx_empleados.personal 
            (id, CIUDAD, ESTADO, ZONA, userName, pswd, nombreCompleto, CURP, RFC, NSS, TELEFONO, TELCASA, NUM_EMERGENCIA, 
            DOMICILIO, eMail, SISTEMA_OPERATIVO, creadoPor)
            VALUES 
            (:id, :cmpCIUDAD, :cmpESTADO, :cmpZONA, :nombreUsuario, :contra, :nombrePromotor, :cmpCURP, 
            :cmpRFC, :cmpNSS, :cmpTELEFONO, :cmpTELCASA, :cmpNUM_EMERGENCIA, 
            :cmpDOMICILIO, :cmpCorreo, :cmpSISTEMAOPERATIVO, :cmpAdmistrador);");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':cmpCIUDAD', $CIUDAD);
            $sql->bindParam(':cmpESTADO', $ESTADO);
            $sql->bindParam(':cmpZONA', $ZONA);
            $sql->bindParam(':nombreUsuario', $username);
            $sql->bindParam(':contra', $password);            
            $sql->bindParam(':nombrePromotor', $nombreCompleto);
            $sql->bindParam(':cmpCURP', $CURP);
            $sql->bindParam(':cmpRFC', $RFC);
            $sql->bindParam(':cmpNSS', $NSS);
            $sql->bindParam(':cmpTELEFONO', $TELEFONO);           
            $sql->bindParam(':cmpTELCASA', $TELCASA);
            $sql->bindParam(':cmpNUM_EMERGENCIA', $NUM_EMERGENCIA);
            $sql->bindParam(':cmpDOMICILIO', $DOMICILIO);
            $sql->bindParam(':cmpCorreo', $eMail);
            $sql->bindParam(':cmpSISTEMAOPERATIVO', $SISTEMA_OPERATIVO);
            $sql->bindParam(':cmpAdmistrador', $administrador);
            if ($sql->execute()) {
                $sql->closeCursor();
                $cnx= null;
                echo "registroCorrecto";
            } else {
                exit("no se pudieron agregar los datos error de conexión a BDD");
            }
            $sql->closeCursor();
            $cnx = null;
        }
    } catch (Exception $e) {
        $sql->closeCursor();
        $cnx = null;
        echo 'Excepci&oacute;n capturada al Almacenar los datos nuevos: ',  $e->getMessage(), "\n";
    } finally{
        $sql0->closeCursor();
        $cnx = null;
    }
} else {
    echo "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
}

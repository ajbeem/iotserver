<?php
require_once './conexionPDO_Usuarios.php';

if (isset($_POST['usuario'])) {
    $user = $_POST['usuario'];
    $pass = $$_POST['password'];
    $obj1 = new ConexionPDO();
    try {
        $conn = $obj1->conectar();
        // En este punto es donde realmente se comete el error y se crea la vulnerabilidad
        $sql = "SELECT * FROM u538442363_yzyju.Clientes WHERE nombreUsuario = $user;";
        // Si el usuario "EXISTE" se retornan valores en el resultset
        if ($res = $conn->query($sql)) {
            if ($res->fetchColumn() > 0) {
                //Se mostrarán los valores recuperados
                var_dump ($res);
                }
            }else{
                //Si el usuario no existe, no se mostrarán valores
                echo "No se encontr&oacute; al usuario";
            }
    } catch (Exception $e) {
        echo 'Excepcion capturada al Almacenar los datos nuevos: '.$e->getMessage();
    } finally{
        $sql->closeCursor();
        $conn = null;
    }
} else {
    echo "NO SE RECIBIERON LOS DATOS CORRECTAMENTE";
}

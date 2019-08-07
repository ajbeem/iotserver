<?php
class ConexionPDO {
    #region Conection Data
        const usuario='u538442363_uqadu';
        const psw='tNib37Gj9j7o';
        const host='sql173.main-hosting.eu.';
        const bd='u538442363_yzyju';
    #end region

    static function conectar() {
        try {            
            $username = self::usuario;
            $password = self::psw;
            $host = self::host;
            $db = self::bd;
            $conexion = new PDO("mysql:dbname=$db;host=$host", $username, $password);            
            $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
            $conexion->exec("SET CHARACTER SET UTF8");            
            return $conexion;            

        } catch (Exception $e) {
            echo "ERROR EN: ".$e->getMessage();
        }
    }
}
?>
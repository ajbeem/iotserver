<?php

class ConexionPDO {
    
    //Server Remoto
    const usuario='u538442363_uqadu';
    const psw='tNib37Gj9j7o';
    const host='sql173.main-hosting.eu.';
    const bd='u538442363_yzyju';

    //Server Local
    /*
    const usuario='root';
    const psw='';
    const host='127.0.0.1';
    const bd='reporte_android';*/

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
/*
<?php 

 //los atributos de abajo son los que tenemos que modificar
    $username = "u292883372_rami"; 
    $password = "cursoandroid"; 
    $host = "localhost"; 
    $dbname = "u292883372_bdrem"; 


    // Para saber más de que se trata UTF-8 visita http://en.wikipedia.org/wiki/UTF-8 
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
     
    try 
    { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    } 
     
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
     
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
    { 
        function undo_magic_quotes_gpc(&$array) 
        { 
            foreach($array as &$value) 
            { 
                if(is_array($value)) 
                { 
                    undo_magic_quotes_gpc($value); 
                } 
                else 
                { 
                    $value = stripslashes($value); 
                } 
            } 
        } 
     
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    } 
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 


?>
*/
?>
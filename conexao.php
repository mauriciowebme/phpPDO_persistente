<?php
//include_once $_SERVER['DOCUMENT_ROOT']."/seguranca/valida_pagina_e_usuario.php";
/*
Modelo de conexão:

require_once "../conexao.php";
$conn = Conexao::getInstance();

*/
#---------------------------------------------------------------------
/*  
Constantes de parâmetros para configuração da conexão  
*/  
define('HOST', 'servidor');  
define('DBNAME', 'nome do banco');  
define('CHARSET', 'utf8');  
define('USER', 'usuario');  
define('PASSWORD', 'senha');  
class Conexao {  
    /*  
    Atributo estático para instância do PDO  
    */  
    private static $conn;

    /*  
    Escondendo o construtor da classe  
    */ 
    private function __construct() {  
    //  
    } 
    /*  
    Método estático para retornar uma conexão válida  
    Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */  
    public static function getInstance() {  
        if (!isset(self::$conn)) {  
            try {  
                $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
                self::$conn = new PDO( 'mysql:host=' . HOST . '; dbname=' . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);
            } catch (PDOException $e) {  
                //print "Erro: " . $e->getMessage();  
                if (!isset($_SESSION)){session_start();}
                session_destroy();
                echo "#erro_bd";
            }  
        }  
        return self::$conn;  
    }  
}

?>
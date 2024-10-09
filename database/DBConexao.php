<?php

class DBConexao
{

    private $host = "localhost";
    private $dbname = "biblioteca";
    private $username = "root";
    private $password = "senac2023";

    private $conx;
    private static $instance = null;

    public function __construct()
    {
        try{
            // Inicializar a conexão
            $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf-8", $this->username, $this->password);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
        }
        catch(PDOException $e){
            // Capturar o erro da conexão
            echo "Erro na conexão com o banco de dados: " . $e->getMessage();
        }
    }   
    
    /**
     * Método estatico para a instancia única da conexão
     */

    public static function getConexao()
    {
        if(!self::$instance){
            self::$instance = new DBConexao(); 
        }
        return self::$instance->conx;
    }
}
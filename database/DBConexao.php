<?php


class DBConexao{

    private $host = "localhost";
    private $dbname = "biblioteca";
    private $username = "root";
    private $password = "senac2023";

    public $conx;
    private static $instance = null;


   
    public function __construct()
    {
        try{
            $this->conx = new PDO("mysql:host=$this->host; dbname=$this->dbname;charset=utf8", $this->username, $this->password);

            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Erro na conxexão com o banco de dados: ".$e->getMessage();
        }
    }

    public static function getConexao(){

        if(!self::$instance){
            self::$instance = new DBConexao();
        }
        return self::$instance->conx;
    }
}
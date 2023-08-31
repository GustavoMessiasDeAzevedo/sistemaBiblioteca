<?php


class Usuario{


    protected $db;
    protected $table = "usuarios"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
    *@param int $id;
    *@return Usuario;

    */
    public function buscar($id){

    }

    public function listar(){

    }
    /**
    *@param array;
    *@return bool;

    */
    public function cadastrar($dados){

    }

     /**
    *@param int $id;
    *@param array $dados;
    *@return bool;

    */
    public function editar($id, $dados){

    }
    
    public function excluir($id){

    }
}
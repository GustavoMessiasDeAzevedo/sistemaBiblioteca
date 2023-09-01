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
        try{
            $query = "INSERT INTO {$this->table}(nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";

            $stmt = $this->db->prepare($query);


            

        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
        }
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);

        try{
            $stmt->execute();
            echo "Inserção bem-sucedida!";
        }catch(PDOException $e){
            echo "Erro na inserção: ". $e->getMessage();
        }

    }

     /**
    *@param int $id;
    *@param array $dados;
    *@return bool;

    */
    public function editar($id, $dados){

        try{
            $query = "UPDATE {$this->table} SET nome = :nome ,email = :email, senha = :senha, perfil = :perfil WHERE id_usuario = :id_usuario";

            $stmt = $this->db->prepare($query);

        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);

            try{
                $stmt->execute();
                echo "Seus dados foram atualizados com sucesso!";
            }catch(PDOException $e){
                echo "Erro na inserção: ". $e->getMessage();
            }


    }
    
    public function excluir($id){

    }
}
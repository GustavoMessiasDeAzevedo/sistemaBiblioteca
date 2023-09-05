<?php

    require_once $_SERVER ['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Usuario{


    protected $db;
    protected $table = "usuarios"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
    *@param int $id;
    *@return Usuario|null;

    */
    public function buscar($id){


        try{
            $query = "SELECT * FROM {$this->table} WHERE id_usuario = :id";
            $stmt = $this->db->prepare($query);
            $stmt ->bindParam(':id', $id);

            $stmt->execute();
            // $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            // if($usuario){

            //     //Vai ser substituido pelo formulário
            //     echo "ID: " . $usuario['id'] . "<br>";
            //     echo "Nome: " . $usuario['nome'] . "<br>";
            //     echo "Email: " . $usuario['email'] . "<br>";
            //     echo "Senha: " . $usuario['senha'] . "<br>";
            //     echo "Perfil: " . $usuario['perfil'] . "<br>";
            // }

            echo "Consulta bem sucedida!";
            return $stmt->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
            return null ;
        }

        

       
    }

    public function listar(){

        try{

            $query = "SELECT * FROM {$this->table}";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
            return null ;
        }

    }
    /**
    *@param array;
    *@return bool;

    */
    public function cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table}(nome, email, senha, perfil) VALUES (:nome, :email, :senha, :perfil)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->execute();
          

        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
        }
           

    }

     /**
    *@param int $id;
    *@param array $dados;
    *@return bool;

    */
    public function editar($id, $dados){

        try{
            $query = "UPDATE {$this->table} SET nome = :nome ,email = :email, senha = :senha, perfil = :perfil WHERE id_usuario = :id";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':senha', $dados['senha']);
            $stmt->bindParam(':perfil', $dados['perfil']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
          

        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }


    }
    
    public function excluir($id){
        try{

            $query = "DELETE FROM {$this->table} WHERE id_usuario = :id";
            $stmt = $this->db->prepare($query);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
            
        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }

    }
}
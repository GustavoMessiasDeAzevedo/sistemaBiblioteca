<?php

class Aluno{

    protected $db;
    protected $table = "alunos"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

     /**
    *@param int $id;
    *@return Aluno;

    */

    public function buscar($id){


        try{
            $query = "SELECT * FROM {$this->table} WHERE id_aluno = :id";
            $stmt = $this->db->prepare($query);
        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
        }

         $stmt ->bindParam(':id', [$id]);

         try{
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario){

                //Vai ser substituido pelo formulário
                echo "ID: " . $usuario['id'] . "<br>";
                echo "Nome: " . $usuario['nome'] . "<br>";
                echo "CPF: " . $usuario['cpf'] . "<br>";
                echo "Email: " . $usuario['email'] . "<br>";
                echo "Telefone: " . $usuario['telefone'] . "<br>";
                echo "Celular: " . $usuario['celular'] . "<br>";
                echo "Data do Nascimento: " . $usuario['data_nascimento'] . "<br>";
            }

            echo "Consulta bem sucedida!";
         }catch(PDOException $e){
            echo "Erro na inserção: ". $e->getMessage();
         }
    }


    public function listar(){

    }

    /**
    *@param array;
    *@return bool;

    */

    public function cadastrar($dados){
        try{
            $query = "INSERT INTO {$this->table}(nome, cpf, email, telefone, celular, data_nascimento) VALUES (:nome, :cpf, :email, :telefone, :celular, :data_nascimento)";

            $stmt = $this->db->prepare($query);


            

        }catch(PDOException $e){
            echo "Erro na preparação da consulta: ". $e->getMessage();
        }
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':celular', $dados['celular']);
            $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);

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
            $query = "UPDATE {$this->table} SET nome = :nome , cpf = :cpf, email = :email, telefone = :telefone, celular = :celular, data_nascimento = :data_nascimento WHERE id_aluno = :id";

            $stmt = $this->db->prepare($query);

        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }

        $stmt->bindParam(':nome', $dados['nome']);
        $stmt->bindParam(':cpf', $dados['cpf']);
        $stmt->bindParam(':email', $dados['email']);
        $stmt->bindParam(':telefone', $dados['telefone']);
        $stmt->bindParam(':celular', $dados['celular']);
        $stmt->bindParam(':data_nascimento', $dados['data_nascimento']);

            try{
                $stmt->execute();
                echo "Seus dados foram atualizados com sucesso!";
            }catch(PDOException $e){
                echo "Erro na inserção: ". $e->getMessage();
            }


    }

    public function excluir($id){
        try{

            $query = "DELETE FROM {$this->table} WHERE id_aluno = :id";
            $stmt = $this->db->prepare($query);
        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }

        $stmt -> bindParam(':id', [$id], PDO::PARAM_INT); 

        try{
            $stmt->execute();
            echo "Seus dados foram apagados com sucesso!";
        }catch(PDOException $e){
            echo "Erro na exclusão: ". $e->getMessage();
        }
    }




}
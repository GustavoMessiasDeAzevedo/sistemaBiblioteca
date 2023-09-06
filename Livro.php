<?php

    require_once $_SERVER ['DOCUMENT_ROOT'] . "/database/DBConexao.php";
class Livro{


    protected $db;
    protected $table = "livros"; 

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }

    /**
    *@param int $id;
    *@return Livro|null;

    */
    public function buscar($id){


        try{
            $query = "SELECT * FROM {$this->table} WHERE id_livro = :id";
            $stmt = $this->db->prepare($query);
            $stmt ->bindParam(':id', $id);

            $stmt->execute();
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
            $query = "INSERT INTO {$this->table}(titulo, autor, numero_pagina, preco, ano_publicacao, isbn) VALUES (:titulo, :autor, :numero_pagina, :preco, :ano_publicacao, :isbn)";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
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
            $query = "UPDATE {$this->table} SET titulo = :titulo , autor = :autor, numero_pagina = :numero_pagina, preco = :preco, ano_publicaca = :ano_publicacao, isbn = :isbn WHERE id_livro = :id";

            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':titulo', $dados['titulo']);
            $stmt->bindParam(':autor', $dados['autor']);
            $stmt->bindParam(':numero_pagina', $dados['numero_pagina']);
            $stmt->bindParam(':preco', $dados['preco']);
            $stmt->bindParam(':ano_publicacao', $dados['ano_publicacao']);
            $stmt->bindParam(':isbn', $dados['isbn']);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
          

        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }


    }
    
    public function excluir($id){
        try{

            $query = "DELETE FROM {$this->table} WHERE id_livro = :id";
            $stmt = $this->db->prepare($query);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
            
        }catch(PDOException $e){
            echo "Erro de preparação de consulta: ". $e->getMessage();
        }

    }
}
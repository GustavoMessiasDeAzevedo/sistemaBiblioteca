<?php

require_once $_SERVER['DOCUMENT_ROOT']. "/models/Livro.php";
class LivroController{

    private $livromodel;

    public function __construct()
    {
       $this->livromodel = new Livro();
    }


    public function listarLivro(){
        return $this->livromodel->listar();
    }
}
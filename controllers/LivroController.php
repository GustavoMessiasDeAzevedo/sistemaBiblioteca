<?php

class LivroController{

    private $livromodel;

    public function __construct()
    {
       $this->livromodel = new Livro();
    }
}
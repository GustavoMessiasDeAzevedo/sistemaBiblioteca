<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
?>


<main class="container mt-3 mb-3">
        <h1>Listar Livros</h1>


        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Numero de paginas</th>
                <th>Preco</th>
                <th>Ano publicação</th>
                <th>isbn</th>
                <th style="width: 200px;">Ação</th>
            </thead>

            <tbody>
                <?php

                $livroController = new LivroController();

                $livros = $livroController->listarLivro();

                foreach($livros as $book):

                ?>

                    <tr>
                        <td><?=$book-> id_livro ?></td>
                        <td><?=$book-> titulo?></td>
                        <td><?=$book-> autor ?></td>
                        <td><?=$book-> numero_pagina ?></td>
                        <td><?=$book-> preco ?></td>
                        <td><?=$book-> ano_publicacao ?></td>
                        <td><?=$book-> isbn ?></td>
                        <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>

                <?php

                endforeach;
                ?>
            </tbody>

        </table>
</main>


<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";

?>
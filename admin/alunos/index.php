<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";

require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/AlunoController.php";
?>

<main class="container mt-3 mb-3">
    <h1>Lista de aluno</h1>


    <table class="table table-striped">

        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Data de nascimento</th>
            <th style="width: 200px;">Ação</th>
        </thead>

        <tbody>

            <?php

            $alunoController = new AlunoController();

            $aluno = $alunoController->listarAluno();

            foreach ($aluno as $student) :
            ?>

                <tr>
                    <td>
                        <?= $student->id_aluno ?>
                    </td>
                    <td>
                        <?= $student->nome ?>
                    </td>
                    <td>
                        <?= $student->cpf ?>
                    </td>
                    <td>
                        <?= $student->email ?>
                    </td>
                    <td>
                        <?= $student->telefone ?>
                    </td>
                    <td>
                        <?= $student->celular ?>
                    </td>
                    <td>
                        <?= $student->data_nascimento ?>
                    </td>
                    <td>
                        <a href="/admin/alunos/editar.php" class="btn btn-primary">Editar</a>
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
require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php"
?>
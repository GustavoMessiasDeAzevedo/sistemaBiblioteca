
<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/UsuarioController.php"
    

?>

    <main class="container mt-3 mb-3">
        <h1>Lista de usuario</h1>

        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th style="width: 200px;">Ação</th>
            </thead>
            <tbody>


                <?php
                    $usuarioController = new UsuarioController();

                    $usuarios = $usuarioController->listarUsuario();

                   // var_dump($usuarios);

                   foreach($usuarios as $user):
                ?>

                <tr>
                    <td><?=$user->id_usuario?></td>
                    <td><?=$user->nome ?></td>
                    <td><?=$user->email ?></td>
                    <td><?=$user->perfil ?></td>
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Editar</a>
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
    
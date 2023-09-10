<?php
include("./bd/conexao.php");

$tabelaUsuario = $con->query("SELECT * FROM usuario ORDER BY id_usuario DESC");
$usuarios = $tabelaUsuario->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="cadastrarUsuario.php" method="POST">
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail">
        <label for="nascimento">Data de Nascimento</label>
        <input type="date" name="nascimento" id="nascimento">
        <input type="submit" value="Cadastrar">
    </form>

    <div class="dadosCadastrados">
    <?php
        if(empty($usuarios)) {
    ?>
        <p>Não há usuários cadastrados!</p>
    <?php
        } else {
    ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>AÇÕES</th>
            </tr>
            <tr>
                <?php 
                foreach($usuarios as $usuario) {
                ?>
                <td><?php echo $usuario["id_usuario"]?></td>
                <td><?php echo $usuario["nome_completo"]?></td>
                <td><?php echo $usuario["cpf"]?></td>
                <td><?php echo $usuario["email"]?></td>
                <td><?php echo $usuario["data_nascimento"]?></td>
                <td>
                    <a href="editarUsuario.php?id_usuario=<?php echo $usuario["id_usuario"]?>">Editar</a>
                    <a href="deletarUsuario.php?id_usuario=<?php echo $usuario["id_usuario"]?>">Deletar</a>
                </td>
                <?php
                }
                ?>
            </tr>
        </table>
    <?php
        }
    ?>
    </div>
</body>
</html>
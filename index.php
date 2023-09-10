<?php
include("./bd/conexao.php");

$tabelaUsuario = $con->query("SELECT * FROM usuario ORDER BY id_usuario DESC");
$usuarios = $tabelaUsuario->fetchAll();

if(isset($_REQUEST["id_usuario"])) {
    $id_usuario = $_REQUEST["id_usuario"];
    $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(":id_usuario", $id_usuario);
    $stmt->execute();
    $usuario = $stmt->fetch(\PDO::FETCH_ASSOC);
} 
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
    <?php 
    if(isset($_REQUEST["id_usuario"])) { 
    ?>
    <form action="editarUsuario.php?id_usuario=<?php echo $usuario["id_usuario"]?>" method="POST">
    <?php
    } else {
    ?>
    <form action="cadastrarUsuario.php" method="POST">
    <?php
    }
    ?>    
        <label for="nome">Nome Completo</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo isset($usuario["nome_completo"]) ? $usuario["nome_completo"] : "";?>">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" value="<?php echo isset($usuario["cpf"]) ? $usuario["cpf"] : "";?>">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" value="<?php echo isset($usuario["email"]) ? $usuario["email"] : "";?>">
        <label for="data_nascimento">Data de Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo isset($usuario["data_nascimento"]) ? $usuario["data_nascimento"] : "";?>">
        <input type="hidden" name="id_usuario" value="<?php echo isset($usuario["id_usuario"]) ? $usuario["id_usuario"] : "";?>">
        <?php 
        if(isset($_REQUEST["id_usuario"])) { 
        ?>
            <input type="submit" value="Editar Usuário">
        <?php 
        } else { 
        ?>
            <input type="submit" value="Cadastrar Usuário">
        <?php
        } 
        ?>
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
            <?php 
                foreach($usuarios as $usuario) {
            ?>
            <tr>
                <td><?php echo $usuario["id_usuario"]?></td>
                <td><?php echo $usuario["nome_completo"]?></td>
                <td><?php echo $usuario["cpf"]?></td>
                <td><?php echo $usuario["email"]?></td>
                <td><?php echo $usuario["data_nascimento"]?></td>
                <td>
                    <a href="index.php?id_usuario=<?php echo $usuario["id_usuario"]?>">Editar</a>
                    <a href="deletarUsuario.php?id_usuario=<?php echo $usuario["id_usuario"]?>">Deletar</a>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
    <?php
        }
    ?>
    </div>
</body>
</html>
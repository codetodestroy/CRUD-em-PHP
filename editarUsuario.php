<?php
include("./bd/conexao.php");

$nome = $_REQUEST["nome"];
$cpf = $_REQUEST["cpf"];
$email = $_REQUEST["email"];
$data_nascimento = $_REQUEST["data_nascimento"];
$id_usuario = $_REQUEST["id_usuario"];

$sql = "UPDATE usuario SET nome_completo = :nome_completo, cpf = :cpf, email = :email, data_nascimento = :data_nascimento WHERE id_usuario = :id_usuario";

$stmt = $con->prepare($sql);
$stmt->bindParam(":nome_completo", $nome);
$stmt->bindParam(":cpf", $cpf);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":data_nascimento", $data_nascimento);
$stmt->bindParam(":id_usuario", $id_usuario);

if($stmt->execute()){
    header("Location: index.php"); 
} else {
    echo 'deu ruim';
}
?>
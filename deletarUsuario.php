<?php
include("./bd/conexao.php");

$nome = $_REQUEST["nome"];
$cpf = $_REQUEST["cpf"];
$email = $_REQUEST["email"];
$nascimento = $_REQUEST["nascimento"];

echo $nome . $cpf . $email . $nascimento;

$sql = "INSERT INTO usuario (nome_completo, cpf, email, data_nascimento) VALUES (:nome_completo, :cpf, :email, :data_nascimento)";

$stmt = $con->prepare($sql);
$stmt->bindParam(":nome_completo", $nome);
$stmt->bindParam(":cpf", $cpf);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":data_nascimento", $nascimento);

if($stmt->execute()){
    header("Location: index.php"); 
}
?>
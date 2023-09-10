<?php
include("./bd/conexao.php");

if($_REQUEST["id_usuario"]) {
    $id_usuario = $_REQUEST["id_usuario"];

    $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";

    $stmt = $con->prepare($sql);
    $stmt->bindParam(":id_usuario", $id_usuario);

    if($stmt->execute()){
        header("Location: index.php"); 
    }
}
?>
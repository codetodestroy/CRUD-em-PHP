<?php
    define("HOST", "localhost:3307");
    define("USER", "root");
    define("PASS", "");
    define("DBNAME", "crud-basico");

    $con = new pdo("mysql:host=".HOST.";dbname=".DBNAME, USER, PASS);

    if($con) {
        //echo "Conectado com sucesso no banco de dados!";
    } else {
        echo "Não conseguimos conectar no banco de dados!";
    }
?>
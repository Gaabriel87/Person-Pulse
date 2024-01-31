<?php

    $dbHost = 'LocalHost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pp';

    $conexao = new mysqli($dbHost , $dbUsername, $dbPassword, $dbName);
    $conexao->set_charset("utf8mb4");
    if($conexao->connect_error){
        echo "Erro";
    }
    else {
        echo "Conexão efetuada com sucesso";
    }
?>

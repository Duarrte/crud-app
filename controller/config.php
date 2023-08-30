<?php

    $dbHost = 'endpoit';
    $dbUsername = 'dbusername';
    $dbPassword = 'senhadobanco';
    $dbName = 'phpdb';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>
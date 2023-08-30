<?php
session_start();
$iddd = $_SESSION['usuario'];

require_once('../controller/config.php'); //chama o arquivo config.php

$id = intval($_GET['id']); //recebe e atribui a uma variável o id

$sql_code_usu = "DELETE FROM usuarios WHERE id = '$id'"; //prepara o código SQL para ser executado

$log = mysqli_query($conexao, "INSERT INTO logs(id, log_data, log_acao, log_status) 
VALUES ('$iddd', NOW(), 'Deletou', 'Funcionou')");

$sql_query_usu = $conexao->query($sql_code_usu) or die($conexao->error); //executa a consulta SQL

if ($sql_query_usu && $log) { //verifica se as consultas foram bem-sucedidas
    header('Location: sistema.php');
} else {
    echo "Erro ao executar ação de exclusão ou registro de log.";
}
?>


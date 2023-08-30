<?php
if (!empty($_GET['id'])) {
    include_once('../controller/config.php');

    $id = $_GET['id'];
    
    $sqlDelete = "DELETE FROM usuarios WHERE id = $id";
    $resultDelete = $conexao->query($sqlDelete);

    if ($resultDelete) {
        $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
                      VALUES ('Sistema', NOW(), 'Deletou', 'funcionou')";
        $resultLog = $conexao->query($query_log);
        
        if (!$resultLog) {
            echo "Erro ao registrar log: " . $conexao->error;
        }
    } else {
        echo "Erro ao deletar registro: " . $conexao->error;
    }
}

header('Location: sistema.php');

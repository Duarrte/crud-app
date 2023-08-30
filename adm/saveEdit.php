<?php
session_start();
include_once('../controller/config.php');
$iddd = $_SESSION['usuario'];

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $loginn = $_POST['loginn'];
    $senha = $_POST['senha'];
    $tel = $_POST['tel'];
    $data_nasc = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];
    $cel = $_POST['cel'];
    $mae = $_POST['mae'];
    $cpf = $_POST['cpf'];
    $nivel = $_POST['nivel'];

    $sqlUpdate = "UPDATE usuarios 
                  SET nome=?, mae=?, cpf=?, data_nasc=?, cel=?, tel=?, endereco=?, loginn=?, senha=?, nivel=?
                  WHERE id=?";
    
    $stmt = $conexao->prepare($sqlUpdate);
    $stmt->bind_param("ssssssssssi", $nome, $mae, $cpf, $data_nasc, $cel, $tel, $endereco, $loginn, $senha, $nivel, $id);
    
    if ($stmt->execute()) {
        $stmt->close();

        $logQuery = "INSERT INTO logs(id, log_data, log_acao, log_status) 
                     VALUES (?, NOW(), 'editou registro', 'funcionou')";
        $stmtLog = $conexao->prepare($logQuery);
        $stmtLog->bind_param("s", $iddd);
        $stmtLog->execute();
        $stmtLog->close();
    }
}

header('Location: sistema.php');
?>

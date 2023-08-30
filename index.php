<?php

include_once('controller/config.php');


$erro = false; //variavel de erro
if (isset($_POST['loginn']) && isset($_POST['senha'])) { //aqui o PHP verifica se existe inserção de dados nos campos e se for true, ele atribui aos valores dos campos, variáveis
  $loginn = $_POST['loginn'];
  $senha = $_POST['senha'];

  $sql_code = "SELECT * FROM usuarios WHERE loginn = '$loginn' and senha = '$senha'"; //codigo sql
  $sql_query = $conexao->query($sql_code) or die($conexao->error); //variavel que dfine o suscesso ou fracasso da operação

  if ($sql_query->num_rows == 0) { //aqui ele verifica se há resultados para o código sql executado, caso seja igual a 0 ele retorna email inconrreto
    $errados = "Dados errados";
  } else {
    $usuario = $sql_query->fetch_assoc(); 
      if (!isset($_SESSION)) { //caso não haja sessão ele inicia uma nova e atribui a superglobal, como um array, os valores encontrados no array $usuario e envia o cliente para a pagina 2fa
        session_start();
        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['nivel'] = $usuario['nivel'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['cpf'] = $usuario['cpf'];
        $_SESSION['mae'] = $usuario['mae'];
        $_SESSION['celular'] = $usuario['cel'];
        $_SESSION['nascimento'] = $usuario['data_nasc'];
        $_SESSION['loginn'] = $_POST['loginn'];
        header("Location: 2fa.php");
      }
    }
  }


  //Aqui ele apresenta um erro caso alguma das operações acima dê errado
  if (!$erro) {
  } else {
    echo $erro;
  }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="css/css.css">
    <title>Login</title>
</head>
<body>

    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
<div class="card card0 border-0">
<div class="row d-flex">
<div class="col-lg-6">
<div class="card1 pb-5">
<div class="row">
<img src="img/telecall.jpg" class="logo">
</div>
<div class="row px-3 justify-content-center mt-4 mb-5 border-line">
<img src="https://i.imgur.com/uNGdWHi.png" class="image">
</div>
</div>
</div>
<div class="col-lg-6">
<div class="card2 card border-0 px-4 py-5" img src="definicoes.png">
<div class="row mb-4 px-3">
<h6 class="mb-0 mr-4 mt-2"></h6>
<button type="button" class="btn btn-primary btn-sm"><a href="banco.php" target="_blank">Banco de dados</a></button>
</div>
<div class="row px-3 mb-4">
<div class="line"></div>
<small class="or text-center"></small>
<div class="line"></div>
</div>
<form action='' method="POST">
<div class="row px-3">
<label class="mb-1"><h6 class="mb-0 text-sm">Login</h6></label>
<input class="mb-4" type="text" name="loginn" placeholder="Login">
</div>
<div class="row px-3">
<label class="mb-1"><h6 class="mb-0 text-sm">Senha</h6></label>
<input type="password" name="senha" placeholder="Coloque sua senha para entrar">
</div>
<br>
<div class="row mb-3 px-3">
<button type="submit" class="btn btn-blue text-center">Login</button>
</div>
<form>
<div class="row mb-4 px-3">
<small class="font-weight-bold">Não tem conta? <a class="text-danger " href="cadastro.php">Click para registrar</a></small>
</div>
</div>
</div>
</div>
</div>
</div>

    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'></script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
    myLink.addEventListener('click', function(e) {
      e.preventDefault();
    });</script>
    
</body>
</html>
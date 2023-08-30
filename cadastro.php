<?php
session_name();




    if(isset($_POST['submit']))
    {

        include_once('controller/config.php');

        $nome = $_POST['nome'];
        $loginn = $_POST['loginn'];
        $senha = $_POST['senha'];
        $tel = $_POST['telefone'];
        $data_nasc = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $cel = $_POST['celular'];
        $mae = $_POST['mae'];
        $cpf = $_POST['cpf'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,mae,cpf,data_nasc,cel,tel,endereco,loginn,senha) 
        VALUES ('$nome','$mae','$cpf','$data_nasc','$cel','$tel','$endereco','$loginn','$senha')");

        header('Location: index.php');
    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Cadastro</title>
    <script>
        function funcao1()
        {
        alert("Parabéns, cadastrado com sucesso");
        }
        </script>
        
       

</head>
<body> <form action ="cadastro.php" method="POST" > 
    <div class="container">
        <div class="card">
            <div class="form">
                <div class="left-side">
                    <div class="left-heading">
                        <h3>Registro</h3>
                    </div>
                    <div class="steps-content">
                        <h3>Etapa <span class="step-number">1</span></h3>
                        <p class="step-number-content active">Coloque seus dados pessoais</p>
                        <p class="step-number-content d-none">Essa é a etapa do Endereço, coloque onde você mora.</p>
                        <p class="step-number-content d-none">Essa é a etapa final, favor colocar seu usuário e sua senha.</p>
                    </div>
                    <ul class="progress-bar">
                        <li class="active">Informação Pessoal</li>
                        <li>Endereço</li>
                        <li>Login</li>
                    </ul>
                    
    
                    
                </div>
                <div class="right-side">
                    <div class="main active">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Informações pessoais</h2>
                            <p>Preencher todas as informações.</p>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require id="user_name" name="nome">
                                <span>Nome:</span>
                            </div>
                            <div class="input-div"> 
                                <input type="text" required require name="mae">
                                <span>Nome Materno:</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require name="cpf">
                                <span>CPF</span>
                            </div>
                            <div class="input-div">
                                <input type="text" required require name="data_nascimento"  id="outra_data" maxlength="10" onkeypress="mascaraData( this, event )">
                                <span>Data de Nascimento</span>
                            </div>
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require name="celular">
                                <span>Telefone Celular:</span>
                            </div>
                            
                                <div class="input-div">
                                    <input type="text" required require name="telefone">
                                    <span>Telefone Fixo:</span>
                                </div>
                        </div>
                        <div class="buttons">
                            <button class="next_button">Próximo</button>
                        </div>
                    </div>
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Endereço</h2>
                            
                        </div>
                        <div class="input-text">
                         
                            </div>
                        <div class="input-text">
                        <div class="input-div">
                            <input type="text" required require name="endereco">
                            <span>Endereço: </span>
                        </div>
                        </div>

                       
                        <div class="input-text">
                            <div class="input-div">
                                
                               
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Voltar</button>
                            <button class="next_button">Próximo</button>
                        </div>
                    </div>
                    <div class="main">
                        <small><i class="fa fa-smile-o"></i></small>
                        <div class="text">
                            <h2>Login</h2>
                            
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="text" required require name="loginn">
                                <span>Usuário</span>
                            </div>
                           
                        </div>
                        <div class="input-text">
                            <div class="input-div">
                                <input type="password" required name="senha">
                                <span>Senha</span>
                            
                            </div>
                        </div>
                        <div class="buttons button_space">
                            <button class="back_button">Voltar</button>
                            <button class="submit_button" name="submit">Concluir</button>
                        </div>
                        </div>
                    </div>
</form>
</body>
<script src="js/script.js"></script>
<script>function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
} </script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
</head>

<body>

    <div align="center" class="justify-content-center align-items-center">
        <br /><br /><br /><br /><br />
        <img class="mb-4" src="../../Assets/Logo/telecall-logo.png" alt="" width="300">
        <h1>Verificação de 2 Fatores!</h1>
        <h5>Apenas por segurança, nos confirme que é você mesmo!</h5><br /><br /><br /><br />
    </div>
    <?php
    require_once('controller/config.php'); //Chamada do arquivo config.php
    session_start(); //aqui ele inicia a sessão para trazer de volta os dados que foram inseridos através da superglobal no momento do login
    $id = $_SESSION['usuario']; //todas as informações da sessão são atribuidas a variaveis
    $tipo = $_SESSION['nivel'];
    $nome = $_SESSION['nome'];
    $mae = $_SESSION['mae'];
    $celular = $_SESSION['celular'];
    $nascimento = $_SESSION['nascimento'];
    $cpf = $_SESSION['cpf'];

    $sql_code = "SELECT mae, cel, data_nasc, cpf FROM usuarios where id = '$id'"; //aqui ele seleciona colunas específicas da tabela usuario
    $sql_query = $conexao->query($sql_code) or die($mysql_error()); //variavel de sucesso ou fracasso da query

    $resultado = mysqli_fetch_array($sql_query); //aqui ele transforma o resultado da query em um array numerico

    $numero = rand(1, 5); //aqui é criada uma variavel para gerar um valor randomico de 1 a 5
    switch ($numero) {//aqui essa variavel é chamada e o switch case gera um html para cada caso
        case 1:
            echo "<form method='POST' action='' align='center'>
                    <div align='center'>
                        <label for='mae'>Digite o Nome de sua Mãe:</label><br/><br/>
                        <input type='text' name='mae' id='mae' class='form-control w-25'/><br/><br/>
                        <input type='submit' value='Autenticar' name='btn' class='btn btn-primary'/>
                    </div>
                </form>";
            break;
        case 2:
            echo "<form method='POST' action='' align='center'>
                    <div align='center'>
                        <label for='celular'>Digite o seu Telefone Celular:</label><br/><br/>
                        <input type='text' name='celular' id='celular' class='form-control w-25'/><br/><br/>
                        <input type='submit' value='Autenticar' name='btn' class='btn btn-primary' />
                    </div>
                </form>";
            break;
        case 3:
            echo "<form method='POST' action='' align='center'>
                    <div align='center'>
                        <label for='nascimento'>Digite sua Data de Nascimento:</label><br/><br/>
                        <input type='text' name='nascimento' id='nascimento' class='form-control w-25' onkeypress='mascaraData( this, event )' /><br/><br/>
                        <input type='submit' value='Autenticar' name='btn' class='btn btn-primary' />   
                    </div>
                </form>";
            break;
        case 4:
            echo "<form method='POST' action='' align='center'>
                    <div align='center'>
                        <label for='ultimos'>Digite os 3 Últimos Digitos do Seu CPF:</label><br/><br/>
                        <input type='text' name='ultimos' id='ultimos' class='form-control w-25' /><br/><br/>
                        <input type='submit' value='Autenticar' name='btn' class='btn btn-primary' />
                    </div>
                </form>";
            break;
        case 5:
            echo "<form method='POST' action='' align='center'>
                    <div align='center'>
                        <label for='primeiros'>Digite os 3 Primeiros Digitos do Seu CPF:</label><br/><br/>
                        <input type='text' name='primeiros' id='primeiros' class='form-control w-25'/><br/><br/>
                        <input type='submit' value='Autenticar' name='btn' class='btn btn-primary' />
                    </div>
                </form>";
            break;
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php
$usu = $_SESSION['usuario']; //aqui é criada uma variavel para pegar o id do usuario
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); // é gerada um array para filtrar os dados adquiridos a partir dos html's gerados pelos echo
if (isset($dados['btn'])) { //o PHP verifica se tem dados sendo enviados dos botoes em html e caso seja true ele faz novas verificações

    if (isset($dados['mae'])) {//o PHP verifica se tem dados sendo enviados específicamente do input gerado naquele momento e caso seja true ele faz novas verificações

        if ($resultado['mae'] == $dados['mae']) { //o PHP verifica seos dados sendo enviados são iguais aos dados do array $resultado, caso tru ele envia dados para a tabela log e faz novas verificações
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Mae',  'Logou')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);

            if ($tipo == 1) { //aqui ele manda o usuario para a pagina equivalente ao seu nivel de acesso, caso seja adm ele leva para lista de usuarios, e caso seja cliente leva para a pagina home
                header('Location: adm/sistema.php');
            } else {
                header('Location: user/sistema.php');
            }
        } else {  
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Mae',  'Errou 2FA')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
           
            session_destroy();
            header('Location: index.php');
        }
    }

    //a partir daqui, o processo é exatamente igual a verificação do input mãe
    if (isset($dados['nascimento'])) {

        if ($resultado['data_nasc'] == $dados['nascimento']) {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Data',  'Logou')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
           
            if ($tipo == 1) {
                header('Location: adm/sistema.php');
            } else {
                header('Location: user/sistema.php');
            }
        } else {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Data',  'Errou 2FA')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            
            session_destroy();
            header('Location: index.php');
        }
    }



    if (isset($dados['celular'])) {

        if ($resultado['cel'] == $dados['celular']) {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Celular',  'Logou')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            
            if ($tipo == 1) {
                header('Location: adm/sistema.php');
            } else {
                header('Location:   user/sistema.php');
            }
        } else {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Celular',  'Errou 2fa')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
           
            session_destroy();
            header('Location: index.php');
        }
    }


  
    if (isset($dados['ultimos'])) {
        $ultimos = substr($cpf, -3); 
        if ($ultimos == $dados['ultimos']) { 
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Ultimos',  'Logou')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            if ($tipo == 1) {
                header('Location: adm/sistema.php');
            } else {
                header('Location: user/sistema.php');
            }
        } else {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Ultimos',  'Errou 2FA')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            session_destroy();
            header('Location: index.php');
        }
    }

    //aqui ele faz o mesmo que na condição anterior porem com os 3 primeiros digitos
    if (isset($dados['primeiros'])) {
        $primeiros = substr($cpf, 0, 3);
        if ($primeiros == $dados['primeiros']) {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_Primeiros',  'Logou')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            if ($tipo == 1) {
                header('Location: adm/sistema.php');
            } else {
                header('Location: user/sistema.php');
            }
        } else {
            $query_log = "INSERT INTO logs(id, log_data, log_acao, log_status) 
            VALUES ('$id',NOW(), '2fa_primeiros',  'Errou 2fa')";
            $sql_query = $conexao->query($query_log) or die($mysqli->error);
            session_destroy();
            header('Location: index.php');
        }
    }
}

?>

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
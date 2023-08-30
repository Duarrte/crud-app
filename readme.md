# AuthTrack


<a href="https://ibb.co/rx0Yj8c"><img src="https://i.ibb.co/N9C5vDm/image.png" alt="image" border="0"></a>

> Este projeto é uma aplicação web que oferece um sistema de Gerenciamento de Usuários com funcionalidades completas de CRUD (Create, Read, Update, Delete), além de recursos avançados de segurança, como autenticação de dois fatores e logs de atividades.

### Ajustes e melhorias

O projeto ainda está em desenvolvimento e as próximas atualizações serão voltadas nas seguintes tarefas:

- [] Tarefa 1 - Aprimorar o estilo do site para oferecer uma experiência mais atraente e intuitiva aos usuários. Isso inclui otimizar o layout, escolher cores harmoniosas e aprimorar a usabilidade geral do site.
- [] Tarefa 2 -  Reforçar a segurança do sistema através da implementação de criptografia de senhas. Utilizar algoritmos confiáveis para proteger as senhas dos usuários, garantindo que elas sejam armazenadas de forma segura e não possam ser facilmente acessadas por terceiros não autorizados.
  


## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

* PHP/Mysql


## 🚀 Instalando AuthTrack

Para instalar o AuthTrack, siga estas etapas:

Baixar o Projeto:
Baixe o projeto a partir do repositório. Você pode clonar o repositório Git ou baixar o arquivo ZIP.

Configurar o Banco de Dados:
Acesse a pasta controller e localize o arquivo config.php. Abra o arquivo e configure as informações de conexão ao banco de dados MySQL, como o nome do banco de dados, o nome de usuário e a senha. Certifique-se de criar o banco de dados no MySQL antes de prosseguir.

Importar a Estrutura do Banco de Dados:
Dentro da pasta database, você encontrará um arquivo SQL chamado phpdb.sql. Importe este arquivo para o seu banco de dados MySQL para criar a estrutura de tabelas necessária para o projeto.

Executar o Aplicativo:
Coloque o projeto em um servidor web compatível com PHP (como Apache ou Nginx) e acesse o diretório onde o projeto está localizado através do navegador.




## ☕ Usando  AuthTrack
Navegação no Aplicativo:
Ao acessar o aplicativo, você encontrará funcionalidades de login, autenticação de 2 fatores e recursos de gerenciamento de usuários. Você também pode acessar logs de atividades para monitorar as ações realizadas por diferentes usuários.

Observações Importantes:

Certifique-se de que o servidor web tenha suporte para PHP e MySQL.
Mantenha as configurações de segurança adequadas ao implantar o projeto em um ambiente de produção.
Este projeto é apenas um exemplo educacional e pode ser estendido e personalizado conforme necessário.

Assim que você criar uma conta, ela será configurada como um usuário comum. Para se tornar um administrador, será necessário fazer uma alteração na tabela de usuários, ajustando o nível de usuário para "1" (administrador) ou "0" (comum). Isso permitirá que você tenha acesso às funcionalidades de administrador com privilégios adicionais. Certifique-se de realizar essa alteração conforme necessário e lembre-se de seguir as práticas de segurança adequadas ao modificar os níveis de acesso dos usuários.



## ! Atenção

O projeto já vem com um usuario adm: 

Nome da mãe: aaaaa

cpf:123456789

data de nascimento: 01/08/2002

cel: 2222

tel: 2222

login:teste

senha:123






## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE.md) para mais detalhes.

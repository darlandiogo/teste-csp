## Projeto teste-csp
- Aplicação em PHP, Laravel e MySQL que gerencia e disponibiliza uma agenda de contatos de pessoas.

## Pré-requisitos para rodar o projeto
- GIT (https://git-scm.com/)
- Docker (https://www.docker.com/)
- Docker compose (https://docs.docker.com/compose/)
- MySQL (https://mariadb.org/download/)
## Instalação
- Faça o clone ou download do projeto acima
- Acesse o prompt de comando(Windows) ou terminal(Linux)
- Usando o cmd ou terminal digite o commando "cd teste-csp" para acessar a pasta teste-csp
- após digite o comando "cp .env.example .env" para gerar o arquivo .env
- crie uma base de dados usando o MySQL
- configure as seguintes variavéis de ambiente no arquivo .env 

    * DB_CONNECTION=mysql
    * DB_HOST=127.0.0.1
    * DB_PORT=3306
    * DB_DATABASE=teste-csp 
    * DB_USERNAME=root
    * DB_PASSWORD=

## Comandos para instalar as dependências no docker ( Linux )
    * sudo docker run --rm -v $(pwd):/app composer install
    * sudo docker-compose build
## Comandos para instalar as dependências no docker ( Windows )
    * docker run --rm -v $(pwd):/app composer install
    * docker-compose build
    
## Comandos para executar o projeto no docker ( Linux )
- sudo docker-compose up para inicializar o projeto
- sudo docker-compose down para parar o projeto

## Comandos para executar o projeto no docker ( Windows )
-  docker-compose up para inicializar o projeto
-  docker-compose down para parar o projeto

![alt-text](https://media.giphy.com/media/d5KuLHHTSaRnG/giphy.gif)

 Agora acesse o projeto conforme o link gerado no terminal ou cmd.


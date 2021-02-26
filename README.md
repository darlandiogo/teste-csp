## Project teste-csp
- Aplicação em PHP, Laravel e MySQL que gerencia e disponibiliza uma agenda de contatos de pessoas.

## Pré-requisitos para rodar o projeto
- GIT (https://git-scm.com/)
- Docker (https://www.docker.com/)
- Docker compose (https://docs.docker.com/compose/)
- MariaDB (https://mariadb.org/download/)
## Instalação
- Faça o clone ou download do projeto acima
- Acesse o prompt de comando(Windows) ou terminal(Linux)
- Usando o cmd ou terminal digite o commando "cd teste-csp" para acessar a pasta teste-csp
- após digite o comando "cp .env.example .env" para gerar o arquivo .env
- configure as seguintes variavéis de ambiente no arquivo .env 

    * DB_CONNECTION=mysql
    * DB_HOST=127.0.0.1
    * DB_PORT=3306
    * DB_DATABASE=teste-csp 
    * DB_USERNAME=root
    * DB_PASSWORD=

- para instalar as dependências use os comandos abaixo
    * sudo docker run --rm -v $(pwd):/app composer install (Linux)
    * sudo docker-compose build (Linux)

    * docker run --rm -v $(pwd):/app composer install (Windows)
    * docker-compose build  (Windows)
    

## Comandas para executar o projeto ( Linux )
- sudo docker-compose up -d para inicializar o projeto
- sudo docker-compose down para parar o projeto

## Comandas para executar o projeto ( Windows )
-  docker-compose up -d para inicializar o projeto
-  docker-compose down para parar o projeto

![alt-text](https://media.giphy.com/media/d5KuLHHTSaRnG/giphy.gif)

 Agora acesse o projeto em http://localhost:8000/contacts


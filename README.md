# Projeto Backend para efetuar pedidos em Laravel PHP com envio de email Fake

with Mailer, Queue and Supervisor

- Database: Sqlite

- tabelas: clientes, produtos, pedidos

## Installation 

- clonar o projeto api-pedidos-laravel
- cd api-pedidos-laravel
- cp .env.example .env
- php artisan key:generate

```
- executar: docker-compose up -d --build

- se der erro, docker-compose down e repetir o comando de up

- Entrar no container Laravel_app para criar as tabelas Clientes e Produtos

php artisan migrate --seed
```



- no container do Laravel_app, dar permissão de escrita no database:
```
chmod 777 -R database/
```

- Executar testes unitários: php artisan test

- Acessar o MailCatcher em //http://localhost:1080 (interface para os emails)

- Efetuar o Post para cadastrar um pedido: http://127.0.0.1:8000/api/pedidos (POST)

- o corpo (body) deve ser baseado no exemplo:

```
{
  "cliente_id":1,
  "produtos": [
    {"produto_id": 1},
    {"produto_id": 4},
    {"produto_id": 3}
    ]
}
```

- Caso o pedido não apareça no MailCatcher, reiniciar o container do supervisor para destravar a fila
- O mailcatcher as vezes não dá refresh automático

## Support

- os 8 produtos possuem foto, se criar um novo precisa selecionar uma foto existente
- Containers: laravel_app, nginx, mailcatcher, supervisor
- collections com as principais Requests (Thunder Client) disponibilizadas na raiz do projeto

## Possiveis Problemas

- Erro database is locked 

executar os passos dentro do container: laravel_app
```
excluir o database dentro da pasta database
php artisan optimize:clear
php artisan migrate --seed
```
- Erro de file_storage session ou cache
```
Rodar dentro do container laravel-app

php artisan config:clear
php artisan cache:clear
php artisan config:cache
```

Se as mensagens não chegarem no MailCatcher, restart na Queue no container Laravel_app

```
php artisan queue:restart
```
## TODO 

refatoração para eliminar a coluna pedidos.pedidoToken

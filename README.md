# Sistema Backend Pastelaria em Laravel PHP com envio de email

with Mailer, Queue and Supervisor

- Database: Sqlite

- tabelas: clientes, produtos, pedidos
## Installation 

- clonar o projeto pastelaria

- cd pastelaria

```
- executar: docker-compose up -d --build

- Executar a migrate com seeder para popular 2 Clientes e 8 Produtos
	php artisan migrate --seed

- Executar testes unitários: php artisan test
```
## Support

- os 8 produtos possuem foto, se criar um novo precisa selecionar uma foto existente
- Containers: laravel_app, nginx, mailcatcher, supervisor
- collections com as principais Requests (Thunder Client) disponibilizadas na raiz do projeto
- para consultar os pedidos que chegam por email, acessar a interface do MailCatcher em http://localhost:1080

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

Se as mensagens não chegarem no MailCatcher, restart na Queue
```php artisan queue:restart
```
## TODO 

refatoração para eliminar a coluna pedidos.pedidoToken

## Features

- O mailcatcher as vezes não dá refresh automático, usar o refresh do navegador
- o endpoint para efetuar pedidos é: http://127.0.0.1:8000/api/pedidos (POST)
- o corpo (body) deve ser baseado no exemplo:

{
  "cliente_id":1,
  "produtos": [
    {"produto_id": 1},
    {"produto_id": 4},
    {"produto_id": 3}
    ]
}
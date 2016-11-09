# silex_api
API desenvolvida para alimentar um quiz. Basta dar o comando abaixo para instalar as dependências:

```
composer install
```

Após isso configurar o banco MySQL, basta ir na pasta src/Providers/DatabaseServiceProvider.php
e alterar o array com sua conexão. Feito isso basta importar o SQL que esta na pasta raíz no seu banco
de dados.

A aplicação já está pronta para funcionar, rode o comando seguinte dentro da pasta public/:

```
php -S localhost:8000
```

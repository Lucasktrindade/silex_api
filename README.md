# Quiz API 
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

Rotas da Aplicação

URL | Metódo HTTP | Operação 
------------ | ------------- |  -----------
/perguntas   |  GET | Retorna um array de perguntas
/pergunta/:id   |  GET | Retorna uma pergunta que contém o :id
/pergunta/:id/alternativas   |  GET | Retorna as alternativas da pergunta com o :id
/pergunta/:id   |  DELETE | Deleta uma pergunta com o id enviado na URL
/pergunta   |  POST | Adiciona uma pergunta, e retorna ela após ter adicionado
/pergunta/:id   |  PUT | Atualiza a pergunta que contém :id
/alternativas   |  GET | Retorna um array de alternativas
/alternativa/:id   |  GET | Retorna uma alternativa que contém o :id
/alternativa/:id   |  DELETE | Deleta uma alternativa com o id enviado na URL
/alternativa   |  POST | Adiciona uma alternativa, e retorna ela após ter adicionado
/alternativa/:id   |  PUT | Atualiza a alternativa que contém :id
/pessoas   |  GET | Retorna um array de pessoas
/pessoa/:id   |  GET | Retorna uma pessoa que contém o :id
/pessoa/:id   |  DELETE | Deleta uma pessoa com o id enviado na URL
/pessoa   |  POST | Adiciona uma pessoa, e retorna ela após ter adicionado
/pessoa/:id   |  PUT | Atualiza a pessoa que contém :id
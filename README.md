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
/perguntas/:id   |  GET | Retorna uma pergunta que contém o :id
/perguntas/:id/alternativas   |  GET | Retorna as alternativas da pergunta com o :id
/perguntas/:id   |  DELETE | Deleta uma pergunta com o id enviado na URL
/perguntas   |  POST | Adiciona uma pergunta, e retorna ela após ter adicionado
/perguntas/:id   |  PUT | Atualiza a pergunta que contém :id
/alternativas   |  GET | Retorna um array de alternativas
/alternativas/:id   |  GET | Retorna uma alternativa que contém o :id
/alternativas/:id   |  DELETE | Deleta uma alternativa com o id enviado na URL
/alternativas   |  POST | Adiciona uma alternativa, e retorna ela após ter adicionado
/alternativas/:id   |  PUT | Atualiza a alternativa que contém :id
/pessoas   |  GET | Retorna um array de pessoas
/pessoas/:id   |  GET | Retorna uma pessoa que contém o :id
/pessoas/:id   |  DELETE | Deleta uma pessoa com o id enviado na URL
/pessoas   |  POST | Adiciona uma pessoa, e retorna ela após ter adicionado
/pessoas/:id   |  PUT | Atualiza a pessoa que contém :id
/partidas   |  GET | Retorna um array de partidas
/partidas/:id   |  GET | Retorna uma partida que contém o :id
/partidas/:id   |  DELETE | Deleta uma partida com o id enviado na URL
/partidas   |  POST | Adiciona uma partida, e retorna ela após ter adicionado
/partidas/:id   |  PUT | Atualiza a partida que contém :id
/authenticate   |  POST | Deve ser passado o email e a senha e vai retornar um token para acesso.
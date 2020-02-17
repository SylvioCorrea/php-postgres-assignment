O arquivo `estoque.php` é a entrada da aplicação e apresenta o json esperado da solução. `Models.php` contém as classes descritas no diagrama. `DbFunctions.php` contém funções que conectam e realizam consultas no banco de dados postgres usando PHP Data Objects (PDO).

Variáveis de acesso ao banco de dados postgres aparecem hardcoded em `estoque.php` (`$dbHost`, `$dbName`, `$dbUser`, `$dbPassword` ) e **devem ser alteradas de acordo com os valores usados no banco de dados do ambiente de execução da aplicação.**

O script `estoquedb.sql` contém o código para criação de um banco de dados de teste com nome testdb, tabelas e inserções conforme o enunciado. Pode ser executado de um terminal psql usando o comando `\i`, caso em que, mesmo no windows, o caminho do arquivo deve ser separado por `/` e não por `\`.

`
\i Driver:/pasta/estoquedb.sql
`

Mesmo no windows o caminho do arquivo deve ser separado por `/` e não por `\`.
Fonte: http://imasters.com.br/linguagens/php/aprenda-a-usar-o-restful-com-php-e-slim-framework/

REST com PHP
---------------------------
 Quando falamos em RESTful, estamos abordando uma forma de acesso a dados semelhante aos webservices, mas que obedecem a arquitetura REST formal. Este padrão pode ser compreendido da seguinte forma:

* RESTful também obdece ao padrão arquitetural REST, então usa HTTP e responde em um formato conhecido (JSON);

* RESTful aceita GET, POST, UPDATE, DELETE como métodos HTTP;

* RESTful possui uma URI em forma de API, em conjunto com o métodos HTTP.

 Se a teoria não forneu uma dimensão sobr o RESTful, vamos à prática para que possamos exemplificar o procsso.



## Slim Framework
 Existem dezenas de frameworks que implementam a arquitetura REST e vamos começar com o Slim Framework, que é bastante leve e prático, possuindo como principal característica a implementação RESTful. Se você acessar o site oficial, poderá ver todoas as caractéristicas que o framework possui.

Para faxer a instalação, acesse o site oficial, clique em "install now" e depois faça o download da Stable Release. Após realizar o download, descompacte o framework.


## instalando o banco de dados



## Definindo a API

 Nossa primeira tarefa é programar o backend, onde teremos os métodos capazes de manipular dados. Antes de programar, lembre-se que estamos obedecendo ao RESTful, e que nele temos que montar uma web API. A grosso modo, uma WebAPI é uma tabela de recursos que o servidor oferece. Um recurso é uma chamada HTTP que pode ser realizada através dos métodos GET, POST, PUT, DELETE. Para o nosso exemplo, iremos fornecer a seguinte API:



* GET /produtos/ Retorna uma lista de todos os produtos cadastrados;
* GET /produtos/<id> Retorna o produto de acordo com sua chave primária <id>;
* POST /produtos/ Salva o objeto produto. Como não há id, gera um INSERT;
* POST /produtos/<id> Salva o objeto produto. Neste caso realiza um UPDATE. Poderia usar PUT também.
* DELETE /produtos/<id> Apaga o objeto produto;
* GET /categorias/ Obtém a lista de categorias.



#Incluindo produtos

Agora vamos incluir um produto. Após esta tarefa, conseguiremos executar duas operações básicas, que é consultar e inserir dados, sendo que as outras operações serão muito semelhantes. Começamos, então, mapeando a requisição no Slim, da seguinte forma:




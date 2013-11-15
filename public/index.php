<?php

  require "../vendor/autoload.php";
  \Slim\Slim::registerAutoloader();


  $app = new \Slim\Slim();
  $app->response()->header('Content-Type', 'application/json;charset=utf-8');
  $app->get('/', function() {
   echo "SlimProdutos";
  });

  $app->get("/categorias","getCategorias");

  $app->post('/produtos/add', 'addProduto');
  
  $app->post('/produtos/edit/:id', 'saveProduto');

  $app->get("/produto/:id", "getProduto");


// run app
  $app->run();

function getConn() {
 return new PDO('mysql:host=127.0.0.1;dbname=SlimProdutos','root','37876732', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


function getCategorias() {
 $stmt = getConn()->query("SELECT * FROM Categorias");
 $categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
 echo "{categorias:". json_encode($categorias)."}";
}



/* Produtos */
function addProduto() {
 $request = \Slim\Slim::getInstance()->request();
 $produto = json_decode($request->getBody());

 $sql = "INSERT INTO Produtos (nome, preco, dataInclusao, idCategoria) values(:nome, :preco, :dataInclusao,idCategoria)";
 $conn = getConn();
 $stmt = $conn->prepare($sql);
 $stmt->bindParam("nome", $produto->nome);
 $stmt->bindParam("preco", $produto->preco);
 $stmt->bindParam("dataInclusao", $produto->dataInclusao);
 $stmt->bindParam("idCategoria", $produto->idCategoria);
 $stmt->execute();
 $produto->id = $conn->lastInsertId();
 echo json_encode($produto);
}

function getProduto($id=null) {
  $conn = getConn();
  $sql = "SELECT * FROM Produtos WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("id",$id);
  $stmt->execute();
  $produto = $stmt->fetchObject();

 // categoria
  $sql = "SELECT * FROM Categorias WHERE id=:id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("id",$produto->idCategoria);
  $stmt->execute();
  $produto->categoria = $stmt->fetchObject();

  echo json_encode($produto);

}


function saveProduto($id) {
  $request = \Slim\Slim::getInstance()->request();
  $produto = json_decode($request->getBody());
  $sql = "UPDATE Produtos SET nome=:nome, preco=:preco, dataInclusao:dataInclusao, idCategoria=:idCategoria WHERE id=:id";
  $conn = getConn();
  $stmt = $conn->prepare($sql);
  $stmt->bindParam("nome", $produto->nome);
  $stmt->bindParam("preco", $produto->preco);
  $stmt->bindParam("dataInclusao", $produto->dataInclusao);
  $stmt->bindParam("idCategoria", $produto->idCategoria);
  $stmt->bindParam("id", $id);
  $stmt->execute();

  echo json_encode($produto);
} 






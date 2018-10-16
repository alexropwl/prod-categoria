<?php

class Produto{


public $id;
public $nome;
public $preco;
public $quantidade;
public $categoria_id;

public function __construct($id = false){

if($id){

$this->id = $id;
$this->carregar();

}

}


public function carregar(){

$query = 'select nome, preco, quantidade, categoria_id from produtos where id= :id';
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(":id", $this->id);
$stmt->execute();

$linha = $stmt->fetch();
$this->nome = $linha['nome'];
$this->preco = $linha['preco'];
$this->quantidade = $linha['quantidade'];
$this->categoria_id = $linha['categoria_id'];






}


public static function listar(){

$query = "select p.id, p.nome, preco, quantidade, categoria_id,
c.nome as categoria_nome
from produtos p inner join categorias c on p.categoria_id = c.id
order by p.nome";
$conexao = Conexao::conectar();
$resultado = $conexao->query($query);
$lista = $resultado->fetchAll();
return $lista;


}

public static function listarPorCategoria($categoria_id){

$query = "SELECT id, nome, preco, quantidade from produtos where categoria_id = :categoria_id";
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(':categoria_id', $categoria_id);
$stmt->execute();
 return $stmt->fetchAll();


}

public function inserir(){

$query = "INSERT INTO produtos (nome,preco,quantidade,categoria_id)
VALUES (:nome, :preco, :quantidade, :categoria_id)";

$conexao = Conexao::conectar();

$stmt = $conexao->prepare($query);
$stmt->bindValue(":nome",$this->nome);
$stmt->bindValue(":preco",$this->preco);
$stmt->bindValue(":quantidade", $this->quantidade);
$stmt->bindValue(":categoria_id",$this->categoria_id);

$stmt->execute();




}


public function atualizar()

{
       $query = "UPDATE produtos SET nome = :nome, preco = :preco, quantidade = :quantidade, categoria_id = :categoria_id WHERE id = :id";
       $conexao = Conexao::conectar();
       $stmt = $conexao->prepare($query);
       $stmt->bindValue(':nome', $this->nome);
       $stmt->bindValue(':preco', $this->preco);
       $stmt->bindValue(':quantidade', $this->quantidade);
       $stmt->bindValue(':categoria_id', $this->categoria_id);
       $stmt->bindValue(':id', $this->id);
       $stmt->execute();
   }

public function excluir(){

$query = "DELETE FROM produtos WHERE id = :id";
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(':id', $this->id);
$stmt->execute();



}










}

 ?>

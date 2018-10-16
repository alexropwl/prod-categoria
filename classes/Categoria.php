<?php
 require_once 'Global.php';

class Categoria
{

    public $id;
    public $nome;
    public $produtos;


public function __construct($id = false){

if($id){


$this->id = $id;
$this->carregar();

}



}
    public static function listar()
    {
        //throw new Exception("erro ao listar");
        $query = "SELECT id, nome FROM categorias order by nome";
        $conexao = Conexao::conectar();
        $resultado = $conexao->query($query);
        $lista = $resultado->fetchAll();
        return $lista;
    }


  public function inserir(){

    $query = "INSERT into categorias (nome) values (:nome)";
   $conexao = Conexao::conectar();
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":nome", $this->nome);

    $stmt->execute();


}

public function atualizar(){

$query = "Update categorias set nome = ':nome' where id = ':id' ";
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(":id", $this->id);
$stmt->bindValue(":nome", $this->nome);

$stmt->execute();




}

public function carregar(){

$query = "select * from categorias where id = :id ";
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(":id", $this->id);
$stmt->execute();
$lista = $stmt->fetchAll();

foreach($lista as $linha){

$this->nome = $linha['nome'];


}




}
public function excluir(){

$query = "Delete from categorias where id = :id";
$conexao = Conexao::conectar();
$stmt = $conexao->prepare($query);
$stmt->bindValue(':id', $this->id);
$stmt->execute();





}

public function carregarProdutos(){

$this->produtos = Produto::listarPorCategoria($this->id);




}










}

<?php

require_once 'Global.php' ;

$nome = $_POST['nome'];
$id = $_POST['id'];

echo $nome;
echo $id;

$categoria = new Categoria($id);
$categoria->nome = $nome;
$categoria->atualizar();

header("Location:/pdo/categorias.php");



 ?>

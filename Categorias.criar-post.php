<?php
require_once 'Global.php';

$categoria = new Categoria();
$nome = $_POST['nome'];
$categoria->nome = $nome;
$categoria->inserir($nome);

header('Location: /pdo/categorias.php ');









 ?>

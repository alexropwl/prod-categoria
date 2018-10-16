<?php require_once 'Global.php' ?>

<?php


$id = $_GET['id'];
$categoria = new Categoria($id);
$categoria->excluir();

header("Location: /pdo/categorias.php");








 ?>

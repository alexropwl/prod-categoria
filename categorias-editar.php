<?php require_once 'cabecalho.php' ?>
<?php require_once 'Global.php' ?>

<?php

$id = $_GET['id'];
$categoria = new Categoria($id);



 ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Categoria</h2>
    </div>
</div>
<form action="Categorias-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Categoria</label>
                <input type="text" name='nome' value="<?php echo $categoria->nome ?>" class="form-control" placeholder="Nome da Categoria">
                <input type="hidden" name="id" value="<?php echo $categoria->id ?>">
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>

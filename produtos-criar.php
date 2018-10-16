<?php require_once 'cabecalho.php' ?>
<?php require_once 'Global.php'?>
<?php

 try {

$listaCAtegoria = Categoria::listar();

 }
 catch(Exception $e){

 Erro::trataErro();


 }

?>

<div class="row">
    <div class="col-md-12">
        <h2>Criar Nova Produto</h2>
    </div>
</div>
<?php if(count($listaCAtegoria) > 0): ?>

<form action="produtos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome do Produto" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco" step="0.01" min="0" class="form-control" placeholder="Preço do Produto" required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name="quantidade"  min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria do Produto</label>
                <select class="form-control" name="categoria_id">
                    <?php  foreach($listaCAtegoria as $lista):?>
                    <option value="<?php echo $lista['id'] ?>"><?php echo $lista['nome'] ?></option>
                  <?php endforeach ?>

                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php else: ?>
  <p>Nenhuma categoria cadastrada no sistema, crie uma categoria antes do produto.</p>

<?php endif ?>


<?php require_once 'rodape.php' ?>

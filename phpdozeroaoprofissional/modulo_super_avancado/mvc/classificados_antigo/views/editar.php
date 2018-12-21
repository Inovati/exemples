<?php
if(!empty($msg)) {
    echo $msg;
}
?>

<div class="container">
    <h1>Meus Anúncios - Editar Anúncio</h1>

    <form method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
                <option value="">Selecione</option>
                <?php foreach($categorias as $categoria): ?>
                    <option value="<?=$categoria['id']?>" <?php echo ($infos['id_categoria'] == $categoria['id'] ? "selected='selected'" : "");?>><?=utf8_encode($categoria['nome'])?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?=$infos['titulo']?>" />
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control" value="<?=$infos['valor']?>" />
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" name="descricao"><?=$infos['descricao']?></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0" <?php echo ($infos['estado'] == 0 ? "selected='selected'" : "");?>>Ruim</option>
                <option value="1" <?php echo ($infos['estado'] == 1 ? "selected='selected'" : "");?>>Bom</option>
                <option value="2" <?php echo ($infos['estado'] == 2 ? "selected='selected'" : "");?>>Ótimo</option>
            </select>
        </div>
        <div class="form-group">
            <label for="add_foto">Fotos do anúncio:</label>
            <input type="file" name="fotos[]" multiple /><br />

            <div class="panel panel-default">
                <div class="panel-heading">Fotos do Anúncio</div>
                <div class="panel-body">
                    <?php foreach($infos['fotos'] as $foto): ?>
                        <div class="foto_item">
                            <img src="<?php echo BASE_URL;?>assets/images/anuncios/<?=$foto['url']?>" class="img-thumbnail" border="0" /><br />
                            <a href="<?php echo BASE_URL;?>anuncios/excluirFoto/<?=$foto['id']?>" class="btn btn-default">Excluir Imagem</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
        <input type="submit" value="Salvar" class="btn btn-default" />

    </form>
</div>
<?php include __DIR__ . "/../inicio-html.php"; ?>
    <form action="/salvar-curso<?= isset($curso) ? "?id=" . $curso->getId() : "" ?>" method="POST">
        <fieldset class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($curso) ? $curso->getDescricao() : "" ?>">
        </fieldset>
        <fieldset class="form-group">
            <input type="submit" class="btn btn-outline-primary mt-2">
        </fieldset>
    </form>
<?php include __DIR__ . "/../fim-html.php"; ?>
<?php include __DIR__ . "/../inicio-html.php"; ?>
    <form action="/salvar-curso" method="POST">
        <fieldset class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            <input type="submit" class="btn btn-primary">
        </fieldset>
    </form>
<?php include __DIR__ . "/../fim-html.php"; ?>
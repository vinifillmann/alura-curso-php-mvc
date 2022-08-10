<?php include __DIR__ . "/../inicio-html.php"; ?>
    <form action="/realiza-login" method="POST">
        <fieldset class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control">
        </fieldset>
        <fieldset class="form-group">
            <input type="submit" class="btn btn-outline-primary mt-2" value="Entrar">
        </fieldset>
    </form>
<?php include __DIR__ . "/../fim-html.php"; ?>
<?php include __DIR__ . "/../inicio-html.php" ?>
    <nav>
        <a href="novo-curso" class="btn btn-primary mb-2">Novo curso</a>
    </nav>

    <ul class="list-group">
        <?php foreach ($cursos as $curso) { ?>
            <li class="list-group-item">
                <?= $curso->getDescricao(); ?>
            </li>
        <?php } ?>
    </ul>
<?php include __DIR__ . "/../fim-html.php"; ?>
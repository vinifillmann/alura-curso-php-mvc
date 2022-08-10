<?php include __DIR__ . "/../inicio-html.php" ?>
    <nav>
        <a href="novo-curso" class="btn btn-outline-primary mb-2">Novo curso</a>
    </nav>

    <ul class="list-group">
        <?php foreach ($cursos as $curso) { ?>
            <li class="list-group-item d-flex justify-content-between">
                <?= $curso->getDescricao(); ?>
                <nav>
                    <a href="/alterar-cursos?id=<?= $curso->getId() ?>" class="btn btn-outline-info btn-sm">Alterar</a>
                    <a href="/excluir-cursos?id=<?= $curso->getId() ?>" class="btn btn-outline-danger btn-sm">Excluir</a>
                </nav>
            </li>
        <?php } ?>
    </ul>
<?php include __DIR__ . "/../fim-html.php"; ?>
<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
    <p><?= $article->getText() ?></p>
    <?php if ($isUserAdmin): ?>
        <h2><a href="/articles/<?= $article->getId() ?>/edit"><?= 'Редактировать' ?></a></h2>
        <?php endif; ?>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>
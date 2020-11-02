<?php
$categories = array_map(function ($category) use ($router) {
    $url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
    return <<<HTML
     <a class="text-info" href="{$url}">{$category->getName()}</a>
HTML;
}, $post->getCategories());
?>

<div class="card">
    <div class="card-body d-flex flex-column justify-content-between">
        <div>
            <h5 class="card-title"><?= $post->getName() ?></h5>
            <p class="text-muted">
                Publié le <?= $post->getCreatedAt()->format('d/m/Y à h\hm') ?>
                <?php if (!empty($post->getCategories())): ?>
                -
                <?= implode(', ', $categories) ?>
                <?php endif ?>
            </p>
        </div>
        <p><?= $post->getExcerpt() ?></p>
        <p class="align-self-baseline"><a href="<?= $router->url('post', ['id' => $post->getID(), 'slug' => $post->getSlug()]) ?>" class="btn btn-dark">Voir plus</a></p>
    </div>
</div>
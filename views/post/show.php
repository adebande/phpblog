<?php

use App\PdoConnection;
use App\Table\CategoryTable;
use App\Table\PostTable;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = PdoConnection::getPDO();
$post = (new PostTable($pdo))->find($id);
(new CategoryTable($pdo))->hydratePosts([$post]);

if ($post->getSlug() !== $slug) {
    $url = $router->url('post', ['slug' => $post->getSlug(), 'id' => $post->getID()]);
    http_response_code(301);
    header('Location: ' . $url);
}

$title = $post->getName();

?>

<div class="container d-flex flex-column justify-content-between">
    <h1><?= $title ?></h1>
    <p class="text-muted mb-2">Publié le <?= $post->getCreatedAt()->format('d/m/Y à h\hm') ?></p>
    <div class="pb-2"> 
        <?php foreach($post->getCategories() as $k => $category):
            if ($k > 0): 
                echo ', ';
            endif;
            $category_url = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);
            ?><a  class="text-info" href="<?= $category_url ?>"><?= htmlentities($category->getName()) ?></a><?php
        endforeach ?>
    </div>
    <p><?= $post->getFormattedContent() ?></p>
    <p class="align-self-baseline"><a href="<?=$router->url('home')?>" class="btn btn-dark">Retour</a></p>
</div>



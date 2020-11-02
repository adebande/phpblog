<?php

use App\PdoConnection;
use App\Table\CategoryTable;
use App\Table\PostTable;

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = PdoConnection::getPDO();
$category = (new CategoryTable($pdo))->find($id);

if ($category->getSlug() !== $slug) {
    $url = $router->url('category', ['slug' => $category->getSlug(), 'id' => $category->getID()]);
    http_response_code(301);
    header('Location: ' . $url);
}

$title = 'Catégorie ' . htmlentities($category->getName());

list($posts, $paginatedQuery) = (new PostTable($pdo))->findPaginatedForCategory($category->getID());

$link = $router->url('category', ['id' => $category->getID(), 'slug' => $category->getSlug()]);

?>

<h1>Catégorie <?= htmlentities($category->getName()) ?></h1>

<div class="container mb-3">
    <div class="row">
        <?php foreach($posts as $post): ?>
        <div class="col-lg-4 d-flex align-items-stretch mt-3">
            <?php require dirname(__DIR__) . '/post/card.php' ?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="d-flex justify-content-between my-4">
        <?= $paginatedQuery->previousLink($link) ?>
        <?= $paginatedQuery->nextLink($link) ?>
    </div>
</div>
<?php

use App\PdoConnection;
use App\Table\PostTable;

$title = 'Mon Blog';
$pdo = PdoConnection::getPDO();

$table = new PostTable($pdo);
list($posts, $pagination) = $table->findPaginated();

$link = $router->url('home');
?>

<h1>Mon blog</h1>

<div class="container mb-3">
    <div class="row">
        <?php foreach($posts as $post): ?>
        <div class="col-lg-4 d-flex align-items-stretch mt-3">
            <?php require 'card.php' ?>
        </div>
        <?php endforeach ?>
    </div>
    <div class="d-flex justify-content-between my-4">
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?>
    </div>
</div>
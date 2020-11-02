<?php

use App\PdoConnection;
use App\Table\PostTable;

$pdo = PdoConnection::getPDO();
$postTable = new PostTable($pdo);
$post = $postTable->find($params['id']);

if (!empty($_POST)) {
    dd('Traiter les données');
}
?>

<h1>Editer l'article <?= $post->getName() ?></h1>

<form action="" method="POST">
    <div class="form-group">
        <label for="name">Titre</label>
        <input type="text" class="form-control" name="name" value="<?= $post->getName() ?>">
    </div>
    <button class="btn btn-secondary">Modifier</button>
</form>
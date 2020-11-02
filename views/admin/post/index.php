<?php

use App\Auth;
use App\PdoConnection;
use App\Table\PostTable;

Auth::check();

$title = "Administration";
$pdo = PdoConnection::getPDO();
$link = $router->url('admin_posts');
list($posts, $pagination) = (new PostTable($pdo))->findPaginated();

?>

<?php if (isset($_GET['delete'])) : ?>
    <div class="alert alert-success">Article supprimé</div>
<?php endif ?>

<h1>Administration des articles</h1>

<div class="container mt-3">

    <table class="table">
        <thead>
            <th>#</th>
            <th>Titre</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= $post->getID() ?></td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>" class="text-muted">
                    <?=htmlentities($post->getName())?>
                    </a>
                </td>
                <td>
                    <a href="<?= $router->url('admin_post', ['id' => $post->getID()]) ?>" class="btn btn-secondary">
                    Editer
                    </a>
                    <form action="<?= $router->url('admin_post_delete', ['id' => $post->getID()]) ?>" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?')" style="display:inline">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-between my-4">
        <?= $pagination->previousLink($link); ?>
        <?= $pagination->nextLink($link); ?>
    </div>

</div>
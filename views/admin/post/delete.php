<?php

use App\Auth;
use App\PdoConnection;
use App\Table\PostTable;

Auth::check();

$pdo = PdoConnection::getPDO();
$table = new PostTable($pdo);
$table->delete($params['id']);
header('Location: ' . $router->url('admin_posts') . '?delete=1');
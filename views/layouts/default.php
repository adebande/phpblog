<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Mon site' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a href="<?=$router->url('home')?>" class="navbar-brand">Mon Site</a>
    </nav>

    <div class="container mt-4">
        <?= $content ?>
    </div>
    
    <footer class="bg-light py-4 footer mt-auto">
        <div class="container">
            Page génerée en <?= round (1000 * (microtime(true) - DEBUG_TIME)) ?> ms.    
        </div>
    </footer>

    </body>
</html>
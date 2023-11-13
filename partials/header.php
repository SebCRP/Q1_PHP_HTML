<?php
function nav_link (string $lien, string $titre) {
    $class = "nav-link";
    if ( $_SERVER["SCRIPT_NAME"] === $lien ) {
        $class = $class.' active';
    }
    return <<<HTML
    <li class="nav-item">
        <a class="$class"aria-current="page" href="$lien">$titre</a>
    </li>
    HTML;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>
        <?= isset($title) ? $title : "Beauvoir" ?>
    </title>
</head>

<body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?= nav_link("/Q1_PHP_HTML/index.php", "Accueil") ?>
                        <?= nav_link("/Q1_PHP_HTML/contact.php", "Contact") ?>
                        <?= nav_link("/Q1_PHP_HTML/jeu.php", "Jeu") ?>
                        <?= nav_link("/Q1_PHP_HTML/users.php", "Utilisateurs") ?>
                        <?= nav_link("/Q1_PHP_HTML/quizz.php", "Quizz") ?>
                        <?= nav_link("/Q1_PHP_HTML/list_users.php", "Liste utilisateurs") ?>
                        <?= nav_link("/Q1_PHP_HTML/create_user.php", "Créer utilisateur") ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
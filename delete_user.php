<?php
$title = "Page d'accueil";
require "./inc/db.php";
require "./partials/header.php";

$query = $pdo->prepare("DELETE FROM users WHERE id = :id");
$query->execute([
    'id' => $_GET["id"]
]);
?>
<main>
    <h1>Suppression effectuée</h1>
    <a href="list_users.php">
        <button class="btn btn-warning">Retour à la liste</button>
    </a>
</main>
<?php
require "./partials/footer.php";
?>
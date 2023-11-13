<?php
$title = "Page d'accueil";
require "./inc/db.php";
require "./partials/header.php";

$success = null;
if (isset($_POST["name"], $_POST["first_name"], $_POST["email"], $_POST["password"])) {
    $query = $pdo->prepare("INSERT INTO users (name, first_name, email, password) VALUES (:name, :first_name, :email, :password)");
    $query->execute([
        'name' => $_POST["name"],
        'first_name' => $_POST["first_name"],
        'email' => $_POST["email"],
        'password' => password_hash($_POST["password"], PASSWORD_DEFAULT)
    ]);
    $success = "Les informations ont été enregistrées";
}
?>
<main>
    <div class="w-50 m-auto">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="first_name" name="first_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Sauvegarder</button>
            </div>
        </form>
    </div>
    <?php if (isset($success)) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
    <?php endif ?>
</main>
<?php
require "./partials/footer.php";
?>
<?php
$title = "Edit";
require "./inc/db.php";
require "./partials/header.php";

$success = null;
if (isset($_POST["name"], $_POST["first_name"], $_POST["email"])) {
    $query = $pdo->prepare("UPDATE users SET name = :name, first_name = :first_name, email = :email WHERE id = :id");
    $query->execute([
        'name' => $_POST["name"],
        'first_name' => $_POST["first_name"],
        'email' => $_POST["email"],
        'id' => $_GET["id"]
    ]);
    $success = "Les informations ont été modifiées";
}

$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$query->execute([
    'id' => $_GET["id"]
]);

if ($query === false) {
    print_r($pdo->errorInfo());
    die("ERREUR SQL");
}

$users = $query->fetch(PDO::FETCH_OBJ);
?>
<main>
    <div class="w-50 m-auto">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" value="<?= $users->name ?>" name="name">
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="first_name" value="<?= $users->first_name ?>" name="first_name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $users->email ?>" name="email">
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
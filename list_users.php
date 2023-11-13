<?php
require "inc/db.php";
$title = "PDO List";

$query = $pdo->query('SELECT * FROM users');

if ($query === false) {
    print_r($pdo->errorInfo());
    die("ERREUR SQL");
}

$users = $query->fetchAll(PDO::FETCH_OBJ);

require "./partials/header.php";
?>
<main>
    <table class="table">
        <thead>
            <th scope="col">NOM</th>
            <th scope="col">PRENOM</th>
            <th scope="col">EMAIL</th>
            <th scope="col">ACTIONS</th>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $user->name ?>
                    <td><?= $user->first_name ?></th>
                    <td><?= $user->email ?></td>
                    <td>
                        <a href="edit_user.php?id=<?= $user->id ?>">
                            <button class="btn btn-success">Editer</button>
                        </a>
                        <a href="delete_user.php?id=<?= $user->id ?>">
                            <button class="btn btn-danger">Supprimer</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>


<?php
require "./partials/footer.php";
?>
<?php
require "./data.php";

$title = "Page d'accueil";
require "./partials/header.php";
?>
<main>
    <table class="table border m-auto w-75">
        <thead>
            <tr>
                <th scope="col">NOM</th>
                <th scope="col">PRENOM</th>
                <th scope="col">EMAIL</th>
                <th scope="col">FONCTION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <th scope="row"><?= $user["name"] ?></th>
                    <td><?= $user["firstName"] ?></td>
                    <td><?= $user["email"] ?></td>
                    <td><?= $user["fonction"] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>
<?php
require "./partials/footer.php";
?>
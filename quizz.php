<?php
$questions = [
    [
        "question" => "Combien de dents a une poule ?",
        "choix" => ["2", "42", "Aucune"],
        "valide" => 2
    ],
    [
        "question" => "Pluton est...",
        "choix" => ["une planète", "une étoile", "un gros caillou"],
        "valide" => 2
    ],
    [
        "question" => "Quelle est la réponse à la grande question sur la vie, l'Univers et le reste ?",
        "choix" => ["Dieu", "42", "Aucune"],
        "valide" => 1
    ],
];

$title = "Quizz";
require "./partials/header.php";
?>
<main>
    <?php if ($_POST == []) : ?>
        <div class="p-3">
            <form action="#" method="post">
                <?php for ($item = 0; $item < count($questions); $item++) : ?>
                    <div class="mt-4">
                        <?= $questions[$item]["question"] ?>
                    </div>
                    <?php for ($choix = 0; $choix < count($questions[$item]["choix"]); $choix++) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="<?= $item ?>" id="choix-<?= $item ?>-<? $choix ?>" value="<?= $choix ?>">
                            <label class="form-check-label" for="choix-<?= $item ?>-<? $choix ?>">
                                <?= $questions[$item]["choix"][$choix] ?>
                            </label>
                        </div>
                    <?php endfor ?>
                <?php endfor ?>
                <button class="btn btn-primary mt-3" type="submit">Envoyer les réponses</button>
            </form>
        </div>
    <?php else : ?>
        <div class="p-3">
            <?php
            $score = 0;
            for ($item = 0; $item < count($questions); $item++) :
                $repondu = isset($_POST[$item]);
                if ($repondu) {
                    $bon = $_POST[$item] == $questions[$item]["valide"];
                    if ($bon) {
                        $message = "Bonne réponse !";
                        $couleur = "success";
                        $score++;
                    } else {
                        $message = "Mauvaise réponse...";
                        $couleur = "danger";
                    }
                } else {
                    $message = "Vous n'avez pas répondu...";
                    $couleur = "danger";
                }
            ?>
                <div class="border border-3 border-<?= $couleur ?> mb-3 p-3">
                    <p>
                        <?= $questions[$item]["question"] ?>
                    </p>
                    <?php if ($repondu) : ?>
                    <p>
                        Vous avez répondu : <?= $questions[$item]["choix"][$_POST[$item]] ?>
                    </p>
                    <?php endif ?>
                    <p>
                        <?= $message ?>
                    </p>
                    <?php if (!$bon) : ?>
                        <p>
                            La bonne réponse était : <?= $questions[$item]["choix"][$questions[$item]["valide"]] ?>
                        </p>
                    <?php endif ?>
                </div>
            <?php endfor ?>
            <div class="text-center">
                <h1>Score : <?= $score ?> / <?= count($questions) ?></h1>
            </div>
        </div>
    <?php endif ?>
</main>
<?php
require "./partials/footer.php";
?>
<?php
$number = 7;

$div_class = "text-center p-3 border border-5 rounded shadow";

if (isset($_POST["try"])) {
    $try = $_POST["try"];

    if ( $try == null) {
        $answer = "Entrez un nombre entre 1 et 10";
        $div_class .= " border-danger";
    } else if ($try > $number) {
        $answer = "$try est trop grand";
        $div_class .= " border-danger";
    } else if ($try < $number) {
        $answer = "$try est trop petit";
        $div_class .= " border-danger"; 
    } else {
        $answer = "GAGNÉ !";
        $div_class .= " border-success";
    }

    $message = <<<MESS
    <div class="$div_class">
        <p class="m-auto">$answer</p>
    </div>
    MESS;
}
else {
    $message = null;
}

$title = "Jeu";
require "./partials/header.php";
?>
<main class="w-25 mx-auto">
    <form action="jeu.php" method="post" class="border border-5 border-primary rounded shadow mb-5 p-2">
        <div class="mb-3">
            <input type="number" name="try" id="try" class="form-control">
        </div>
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <?= $message ?>
</main>
<?php
require "./partials/footer.php";
?>
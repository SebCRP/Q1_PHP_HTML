<?php
$title = "Contact";
$message = $_POST["message"];
require "./partials/header.php";
?>
<main>
    <form action="/Q1_PHP_HTML/contact.php" method="POST" class="w-50 m-auto">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
    <?php if (isset($message) && $message != "") : ?>
        <div class="w-50 m-auto text-center">
            <p><?= $message ?></p>
        </div>
    <?php endif ?>
</main>
<?php
require "./partials/footer.php";
?>
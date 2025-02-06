<?php if (isset($erreur)) { ?>
    <div class="error-template">
        <p> <?= $erreur ?> </p>
    </div>
<?php } else if (isset($succes)) { ?>
    <div class="succes-template">
        <p><?= $succes ?></p>
    </div>
<?php } ?>
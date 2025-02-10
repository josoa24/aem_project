<?php if (null !== ($succes = session()->getFlashdata('succes'))) { ?>
    <div class="succes-template">
        <p><?= $succes ?></p>
    </div>
<?php } ?>
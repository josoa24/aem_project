<?php foreach ($payement as $eachPayement) { ?>
    <div class="images" style="display: none;" data-index="<?= $eachPayement['aem_id_payment']  ?>">
        <div class="image-container">
            <svg class="icon-closer" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#39516c">
                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
            </svg>
            <img src="<?= base_url($eachPayement['aem_payment_screenshot']); ?>" alt="">
        </div>
    </div>
<?php } ?>
<div class="content">
    <div class="table">
        <header class="head-infs">
            <h4>Demande en cours</h4>
        </header>
        <header class="head-column">
            <p>Nom </p>
            <p>Prenom</p>
            <p>Numéro de téléphone</p>
            <p>Mot de passe</p>
            <p>Photo</p>
            <p>Validation</p>

        </header>

        <div class="list-budget">
            <?php foreach ($payement as $eachPayement) { ?>
                <div class="each-item">
                    <p><?= $eachPayement['aem_name'] ?></p>
                    <p><?= $eachPayement['aem_first_name'] ?></p>
                    <p><?= $eachPayement['aem_phone_number'] ?></p>
                    <p><?= $eachPayement['aem_user_password'] ?></p>
                    <p><span class="buttons" data-index="<?= $eachPayement['aem_id_payment'] ?>">Voir la photo</span></p>
                    <?php if ($eachPayement['aem_validation']  != null) { ?>
                        <button type="button" disabled>Validé</button>
                    <?php } else { ?>
                        <a href="<?= base_url('admin/validDemand?id_aem_validation=' . $eachPayement['aem_id_payment']) ?>">
                            <button type="button">
                                Valider
                            </button>
                        </a>
                    <?php } ?>
                </div>
            <?php }   ?>
        </div>
    </div>
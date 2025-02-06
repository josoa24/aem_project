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
                <div class="each-budget">
                    <p><?= $eachPayement['aem_name'] ?></p>
                    <p><?= $eachPayement['aem_first_name'] ?></p>
                    <p><?= $eachPayement['aem_phone_number'] ?></p>
                    <p><?= $eachPayement['aem_user_password'] ?></p>
                    <p>Photo</p>
                    <a href="">
                        <button>
                            Valider
                        </button>
                    </a>
                </div>
            <?php }   ?>
        </div>
    </div>
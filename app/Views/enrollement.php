<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/enrollement.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/icons/favicon-96x96.png') ?>" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/icons/favicon.svg') ?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/icons/favicon.ico') ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/icons/apple-touch-icon.png') ?>" />
    <link rel="manifest" href="<?= base_url('assets/icons/site.webmanifest') ?>" />
    <script src="<?= base_url('assets/js/suggestion.js') ?>" defer></script>
    <title>Inscription </title>

</head>

<body>
    <img src="<?= base_url('assets/images/AEM_Final.png') ?>" alt="">
    <div class="form-container">
        <h2>Inscription</h2>
        <?php include "messages.php"; ?>
        <form action="<?= base_url('register') ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                echo session()->getFlashdata('error')['name']['value'];
                                                            } ?>" class="<?php if (isset(session()->getFlashdata('error')['name']['message'])) {
                                                                                echo 'error';
                                                                            } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['name']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['name']['message']; ?></p>
            <?php endif; ?>

            <label for="first_name">Prénom :</label>
            <input type="text" id="first_name" name="first_name" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                            echo session()->getFlashdata('error')['first_name']['value'];
                                                                        } ?>" class="<?php if (isset(session()->getFlashdata('error')['first_name']['message'])) {
                                                                                            echo 'error';
                                                                                        } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['first_name']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['first_name']['message']; ?></p>
            <?php endif; ?>

            <label for="sex">Sexe :</label>
            <select id="sex" name="sex" class="<?php if (isset(session()->getFlashdata('error')['sex']['message'])) {
                                                    echo 'error';
                                                } ?>" required>
                <option value="M" <?php if (null !== session()->getFlashdata('error') && session()->getFlashdata('error')['sex']['value'] == 'M') echo 'selected'; ?>>Homme</option>
                <option value="F" <?php if (null !== session()->getFlashdata('error') && session()->getFlashdata('error')['sex']['value'] == 'F') echo 'selected'; ?>>Femme</option>
            </select>
            <?php if (isset(session()->getFlashdata('error')['sex']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['sex']['message']; ?></p>
            <?php endif; ?>

            <label for="date_of_birth">Date de naissance :</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                                    echo session()->getFlashdata('error')['date_of_birth']['value'];
                                                                                } ?>" class="<?php if (isset(session()->getFlashdata('error')['date_of_birth']['message'])) {
                                                                                                    echo 'error';
                                                                                                } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['date_of_birth']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['date_of_birth']['message']; ?></p>
            <?php endif; ?>
            <div class="form-section">
                <label for="place_of_birth">Lieu de naissance :</label>
                <input type="text" id="place_of_birth" name="place_of_birth" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                                        echo session()->getFlashdata('error')['place_of_birth']['value'];
                                                                                    } ?>" class="<?php if (isset(session()->getFlashdata('error')['place_of_birth']['message'])) {
                                                                                                        echo 'error';
                                                                                                    } ?>" required>
                <div id="suggestedPlace" class="suggested">
                    <?php foreach ($place_of_birth as $each_place) { ?>
                        <p><?= $each_place['aem_place_of_birth'] ?> </p>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset(session()->getFlashdata('error')['place_of_birth']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['place_of_birth']['message']; ?></p>
            <?php endif; ?>



            <label for="id_number">Numero CIN :</label>
            <input type="text" id="id_number" name="id_number" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                            echo session()->getFlashdata('error')['id_number']['value'];
                                                                        } ?>" class="<?php if (isset(session()->getFlashdata('error')['id_number']['message'])) {
                                                                                            echo 'error';
                                                                                        } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['id_number']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['id_number']['message']; ?></p>
            <?php endif; ?>

            <label for="id_issue_date">Date de délivrance :</label>
            <input type="date" id="id_issue_date" name="id_issue_date" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                                    echo session()->getFlashdata('error')['id_issue_date']['value'];
                                                                                } ?>" class="<?php if (isset(session()->getFlashdata('error')['id_issue_date']['message'])) {
                                                                                                    echo 'error';
                                                                                                } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['id_issue_date']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['id_issue_date']['message']; ?></p>
            <?php endif; ?>
            <div class="form-section">
                <label for="id_issue_place">Lieu de délivrance :</label>
                <input type="text" id="id_issue_place" name="id_issue_place" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                                        echo session()->getFlashdata('error')['id_issue_place']['value'];
                                                                                    } ?>" class="<?php if (isset(session()->getFlashdata('error')['id_issue_place']['message'])) {
                                                                                                        echo 'error';
                                                                                                    } ?>" required>
                <div id="suggested_issue_place" class="suggested">
                    <?php foreach ($issue_place as $each_place) { ?>
                        <p><?= $each_place['aem_id_issue_place'] ?> </p>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset(session()->getFlashdata('error')['id_issue_place']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['id_issue_place']['message']; ?></p>
            <?php endif; ?>

            <label for="phone_number">Numéro de téléphone :</label>
            <input type="tel" id="phone_number" name="phone_number" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                                echo session()->getFlashdata('error')['phone_number']['value'];
                                                                            } ?>" class="<?php if (isset(session()->getFlashdata('error')['phone_number']['message'])) {
                                                                                                echo 'error';
                                                                                            } ?>" required>
            <?php if (isset(session()->getFlashdata('error')['phone_number']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['phone_number']['message']; ?></p>
            <?php endif; ?>
            <div class="form-section">
                <label for="country">Pays :</label>
                <input type="text" name="country" id="country" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                            echo session()->getFlashdata('error')['country']['value'];
                                                                        } ?>" class="<?php if (isset(session()->getFlashdata('error')['country']['message'])) {
                                                                                            echo 'error';
                                                                                        } ?>" required>

                <div id="suggestedCountries" class="suggested">
                    <?php foreach ($country as $each_country) { ?>
                        <p><?= $each_country['aem_country'] ?> </p>
                    <?php } ?>
                </div>
                <?php if (isset(session()->getFlashdata('error')['country']['message'])): ?>
                    <p class="error-text"><?= session()->getFlashdata('error')['country']['message']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-section">

                <label for="state">Région :</label>
                <input type="text" id="state" name="state" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                        echo session()->getFlashdata('error')['state']['value'];
                                                                    } ?>" class="<?php if (isset(session()->getFlashdata('error')['state']['message'])) {
                                                                                        echo 'error';
                                                                                    } ?>" required>
                <div id="suggestedRegion" class="suggested">
                    <?php foreach ($state as $each_country) { ?>
                        <p><?= $each_country['aem_state'] ?> </p>
                    <?php } ?>
                </div>
            </div>

            <?php if (isset(session()->getFlashdata('error')['state']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['state']['message']; ?></p>
            <?php endif; ?>
            <div class="form-section">

                <label for="city">Ville :</label>
                <input type="text" id="city" name="city" value="<?php if (null !== session()->getFlashdata('error')) {
                                                                    echo session()->getFlashdata('error')['city']['value'];
                                                                } ?>" class="<?php if (isset(session()->getFlashdata('error')['city']['message'])) {
                                                                                    echo 'error';
                                                                                } ?>" required>
                <div id="suggested_city" class="suggested">
                    <?php foreach ($city as $each_country) { ?>
                        <p><?= $each_country['aem_city'] ?> </p>
                    <?php } ?>
                </div>
            </div>
            <?php if (isset(session()->getFlashdata('error')['city']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['city']['message']; ?></p>
            <?php endif; ?>

            <label for="identity_photo">Photo d'identite :</label>
            <input type="file" id="identity_photo" name="identity_photo" class="<?php if (isset(session()->getFlashdata('error')['identity_photo']['message'])) {
                                                                                    echo 'error';
                                                                                } ?>" accept="image/*" required>
            <?php if (isset(session()->getFlashdata('error')['identity_photo']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['identity_photo']['message']; ?></p>
            <?php endif; ?>

            <label for="photo">Capture d'ecran du paiement :</label>
            <input type="file" id="photo" name="photo" class="<?php if (isset(session()->getFlashdata('error')['photo']['message'])) {
                                                                    echo 'error';
                                                                } ?>" accept="image/*" required>
            <?php if (isset(session()->getFlashdata('error')['photo']['message'])): ?>
                <p class="error-text"><?= session()->getFlashdata('error')['photo']['message']; ?></p>
            <?php endif; ?>

            <button class="submit-button" type="submit">S'inscrire</button>

            <p class="login-link">
                Déjà inscrit? <a href="login">Connectez-vous ici</a>
            </p>
        </form>
    </div>
</body>

</html>
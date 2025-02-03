<?php
include(ROOTPATH . 'public\assets\inc\coutry-lists.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/enrollement.css')?>">
    <title>Inscription</title>
  
</head>

<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <form action="register" method="POST" enctype="multipart/form-data">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="first_name">Prénom:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="country">Pays:</label>
            <select name="country" id="country" required>
                <?php foreach ($pays as $country) { ?>
                    <option value="<?= $country['id'] ?>"><?= $country['pays'] ?></option>
                <?php } ?>
            </select>

            <label for="city">Ville:</label>
            <input type="text" id="city" name="city" required>

            <label for="photo">Photo (Capture du paiement):</label>
            <input type="file" id="photo" name="photo" accept="image/*">

            <button class="submit-button" type="submit">S'inscrire</button>
        </form>

        <p class="login-link">
            Déjà inscrit? <a href="login.html">Connectez-vous ici</a>
        </p>
    </div>
</body>

</html>
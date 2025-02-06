<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/enrollement.css') ?>">
    <title>Inscription </title>

</head>

<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <?php include "messages.php"; ?>
        <form action="register" method="POST" enctype="multipart/form-data">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>

            <label for="first_name">Prénom:</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="sex">Sexe:</label>
            <select id="sex" name="sex" required>
                <option value="male">Homme</option>
                <option value="female">Femme</option>
                <option value="other">Autre</option>
            </select>

            <label for="date_of_birth">Date de naissance :</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>

            <label for="place_of_birth">Lieu de naissance :</label>
            <input type="text" id="place_of_birth" name="place_of_birth" required>

            <label for="id_number">Numero CIN:</label>
            <input type="text" id="id_number" name="id_number" required>


            <label for="id_issue_date">Date de délivrance :</label>
            <input type="date" id="id_issue_date" name="id_issue_date" required>

            <label for="id_issue_place">Lieu de délivrance:</label>
            <input type="text" id="id_issue_place" name="id_issue_place" required>

            <label for="phone_number">Numéro de téléphone:</label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <label for="country">Pays:</label>
            <input type="text" name="country" id="country" required>


            <label for="state">Région:</label>
            <input type="text" id="state" name="state" required>

            <label for="city">Ville:</label>
            <input type="text" id="city" name="city" required>

            <label for="identity_photo">Photo d'identite:</label>
            <input type="file" id="identity_photo" name="identity_photo" accept="image/*" required>

            <label for="photo">Capture d'ecran du paiement :</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <button class="submit-button" type="submit">S'inscrire</button>
        </form>

        <p class="login-link">
            Déjà inscrit? <a href="login">Connectez-vous ici</a>
        </p>
    </div>
</body>

</html>
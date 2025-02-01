<?php
include(ROOTPATH . 'public\assets\inc\coutry-lists.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            font-size: '';
            font-size: 15px;
            box-sizing: border-box;
            font-family: Inter,
                sans-serif;
            color: #49515a;
        }

        h2 {
            height: 40px;
            font-size: 25px;
            color: #6654e0;
            text-align: center;
        }

        body {
            background-image: url('../../public/assets/images/aem_photo.jpg');
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media screen and (max-width:470px) {
            .form-container {
                width: 98%;
            }
        }

        .form-container {
            width: 35%;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(148, 148, 148, 0.69);
        }

        input,
        label,
        select {
            width: 100%;
            height: 35px;
            display: block;
            display: flex;
            align-items: center;
            outline: none;
        }


        input:not(input[type="file"]) {
            border-radius: 4px;
            border: 1px solid rgb(198, 200, 201);
        }

        input:focus:not(input[type="file"]) {
            border: 1px solid #6654e0;
            box-shadow: 0px 0px 4px #6654e0;
        }



        input:not(input[type="file"]) {
            padding: 0px 10px;
        }

        select {

            padding-left: 10px;
        }

        .submit-button {
            width: 100%;
            height: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            background-color: #6654e0;
            border: none;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
            margin-bottom: 10px;
        }

        .submit-button:hover {
            cursor: pointer;
            background-color: rgb(75, 60, 173);

        }


        .login-link {
            width: 100%;
            height: 30px;
            display: flex;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .login-link a:hover {
            color: rgb(75, 60, 173);
        }
    </style>
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

            <label for="photo">Photo (Capture du payement):</label>
            <input type="file" id="photo" name="photo" accept="image/*">

            <button class="submit-button" type="submit">S'inscrire</button>
        </form>

        <p class="login-link">
            Déjà inscrit? <a href="login.html">Connectez-vous ici</a>

        </p>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-icons/bootstrap-icons.css') ?>">
    <title>Login</title>
</head>

<body>
    <div class="container-login">
        <div class="wrapper">
            <div class="right-element">
                <div class="title">
                    <span class="title-sign-in">Sign In</span>
                    <form action="loginClient" method="post">
                        <div class="form-group">
                            <label for="email">Numero:</label>
                            <div class="input-group">
                                <i class="bi bi-telephone"></i>
                                <input type="text" id="email" name="email" value="Rakoto@email.com" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="input-group">
                                <i class="bi bi-lock"></i>
                                <input type="password" id="password" name="motDePasse" placeholder="Password" value="1234" required>
                            </div>
                        </div>
                        <button class="sign-in">sign in</button>
                    </form>

                </div>
            </div>
            <div class="left-element">
                <span class="big-title">Bienvenue dans notre communauté d'entraide!</span>
                <img src="<?= base_url('assets/images/AEM_Final.png') ?>" alt="">
                <span>
                    Nous sommes heureux de vous compter parmi nous. Ensemble, nous œuvrons pour un avenir meilleur à Madagascar. N'hésitez pas à participer, échanger et faire grandir notre mission collective. À très bientôt !
                </span>
            </div>
        </div>
    </div>
</body>

</html>
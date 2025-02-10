<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?= base_url('assets/icons/favicon-96x96.png') ?>" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/icons/favicon.svg') ?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/icons/favicon.ico') ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/icons/apple-touch-icon.png') ?>" />
    <link rel="manifest" href="<?= base_url('assets/icons/site.webmanifest') ?>" />
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
                    <?php include("messages.php"); ?>
                    <form action="<?= base_url('admin/dashboard') ?>" method="post">
                        <div class="form-group">
                            <label for="number">Numéro :</label>
                            <div class="input-group">
                                <i class="bi bi-telephone"></i>
                                <input type="text" id="number" name="number"
                                    value="<?= session()->getFlashdata('error')['number']['value'] ?? '' ?>"
                                    class="<?= isset(session()->getFlashdata('error')['number']['message']) ? 'error' : '' ?>"
                                    placeholder="Votre numéro d'inscription" required>
                            </div>
                            <?php if (isset(session()->getFlashdata('error')['number']['message'])): ?>
                                <p class="error-text"><?= session()->getFlashdata('error')['number']['message']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <div class="input-group">
                                <i class="bi bi-lock"></i>
                                <input type="password" id="password" name="motDePasse"
                                    value="<?= session()->getFlashdata('error')['motDePasse']['value'] ?? '' ?>"
                                    class="<?= isset(session()->getFlashdata('error')['motDePasse']['message']) ? 'error' : '' ?>"
                                    placeholder="Mot de passe" required>
                            </div>
                            <?php if (isset(session()->getFlashdata('error')['motDePasse']['message'])): ?>
                                <p class="error-text"><?= session()->getFlashdata('error')['motDePasse']['message']; ?></p>
                            <?php endif; ?>
                        </div>

                        <button class="sign-in">Sign in</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
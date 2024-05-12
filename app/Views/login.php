<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Authentification</title>
</head>

<body>
    <div class="body-login">
        <div class="login-container">
            <h2><b>Connexion à la Plateforme Collaborative</b></h2>
            <form class="" action="/login" method="post">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" id="email" value=" <?= set_value('email') ?>" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" id="password" value="" required>
                <button type="submit">Se Connecter</button>
                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</body>

</html>
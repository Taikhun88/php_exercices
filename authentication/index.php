<?php

require_once './is_logged_in.php';
$currentUser = isLoggedIn();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>

<body>
    <nav>
        <?php if (!$currentUser) : ?>
            <a href="/authentication/profile.php">Profil</a>
            <a href="/authentication/logout.php">Se déconnecter</a>
        <?php else : ?>
            <a href="/authentication/login.php">Se connecter</a>
            <a href="/authentication/register.php">S'inscrire</a>

        <?php endif; ?>
    </nav>

    <h1>Homepage</h1>

</body>

</html>
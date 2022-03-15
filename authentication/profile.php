<?php
require_once './is_logged_in.php';

$currentUser = isLoggedIn();
if (!$currentUser) {
  header('Location: /authentication/login.php');
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil</title>
</head>

<body>
    <nav>
        <a href="/authentication">Page d'accueil</a>
        <a href="/authentication/login.php">Se connecter</a>
        <a href="/authentication/logout.php">Se déconnecter</a>
        <a href="/authentication/profile.php">Mon profil</a>
        <a href="/authentication/register.php">S'inscrire</a>
    </nav>

    <h1>Mon profil</h1>

    <h2>Bienvenue <?= $currentUser['username'] ?> </h2>
    
</body>

</html>
<?php
$pdo = require_once './database.php';
$sessionId = $_COOKIE['session'] ?? 'vide';
var_dump($sessionId);
if ($sessionId) {
  $sessionsStatement = $pdo->prepare('SELECT * FROM session WHERE id=?');
  $sessionsStatement->execute([$sessionId]);
  $session = $sessionsStatement->fetch();

  if ($session) {
    $userStatement = $pdo->prepare('SELECT * FROM user WHERE id=?');
    $userStatement->execute([$session['userid']]);
    $user = $userStatement->fetch();
  }
}

if (!$user) {
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

    <h2>Bienvenue <?= $user['username'] ?> </h2>
    
</body>

</html>
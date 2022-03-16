<?php 
$pdo = require_once './database.php';

$sessionId = $_COOKIE['session'] ?? '';

if ($sessionId) {
    $statement = $pdo->prepare('DELETE FROM session WHERE id=:id');
    $statement->bindValue(':id', $sessionId);
    $statement->execute();
    
    setcookie('session', '', time() -1);
    header('Location: /authentication/login.php');
}

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
        <a href="/authentication">Page d'accueil</a>
        <a href="/authentication/login.php">Se connecter</a>
        <a href="/authentication/logout.php">Se déconnecter</a>
        <a href="/authentication/profile.php">Profil</a>
        <a href="/authentication/register.php">S'inscrire</a>
    </nav>


    <h1>Se déconnecter</h1>

</body>

</html>
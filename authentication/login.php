<?php 
$pdo = require_once './database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL, 
    ]);
    
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';

    if (!$password || !$email) {
        $error = 'ERROR';
    }  else {
        $statementUser = $pdo->prepare('SELECT * FROM user WHERE email=:email');
        $statementUser->bindValue(':email', $email);
        $statementUser->execute();
        
        $user = $statementUser->fetch();
        // when proceeding with test if password is clear and not hashed the result return will be the else case
        if (password_verify($password, $user['password'])) {
            $statementSession = $pdo->prepare('INSERT INTO session VALUES (DEFAULT, 
                :userid)');
                $statementSession->bindValue(':userid', $user['id']);
                $statementSession->execute();

                $session = $pdo->lastInsertId();
                setcookie('session', $sessionId, time() + 60 * 60 * 24 * 14, "", "", false, true);

                header('Location: /authentication/profile.php');
        } else {
            $error = "Mot de passe erroné";
        }
        // var_dump($user);
        // var_dump($password);

    }
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

    <h1>Se connecter</h1>

    <form action="/authentication/login.php" method="POST">
        <input type="text" placeholder="email" name="email">
        <br> <br>
        <input type="password" placeholder="password" name="password">
        <br> <br>
        <?php if ($error) : ?>
            <h1 style = "color:red;"> <?= $error ?> </h1>
        <?php endif; ?>
        <button>Envoyer</button>
    </form>

</body>

</html>


<?php 
// call the pdo through the database file
$pdo = require_once './database.php';

// in case of error or not better to display nothing
$error = '';

//checks existence of the request method sent via the form with a strict check ===
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // to filter so to avoid any undesired typed character for each input
    $input = filter_input_array(INPUT_POST, [
        'username' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_SANITIZE_EMAIL, 
    ]);
    
    // coalescence conditions to get the data sent via SUPERGLOBAL POST
    $username = $input['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $input['email'] ?? '';
    
    // To be sure that every data is sent if not needs to display a customisez yet general error message
    if (!$username || !$password || !$email) {
        $error = 'ERROR';
    } else {
        // To prevent hacking of delicate data such as password, we protect it with method password hash ARGON so it's not visible in database
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        // SQL request to create 
        $statement = $pdo->prepare('INSERT INTO user VALUES (
            DEFAULT, 
            :email, 
            :username,
            :password
        )');
        
        // SQL methods to attach, bind the data from the form 
        $statement->bindValue(':email', $email);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hashedPassword);

        $statement->execute();
        
        // Redirects immediately after execution of successful registration
        header('Location: /authentication/login.php');
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

    <h1>S'inscrire</h1>

    <form action="/authentication/register.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <br> <br>
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


<!-- https://www.w3resource.com/php-exercises/php-basic-exercises.php -->

<h3>Exo 1 - Afficher version PHP et information de configuration</h3>
<?php

// Function phpversion only displays the number of version of PHP we are working with
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo phpversion() . "</br>";
    ?>
    <button id="btnId">Afficher</button>
    <div id="elementId" style = "display:none">
        <?php
        // The function phpinfo displays all info by default but there is a few of arguments which are CONSTANT which can be used to only display what we look for.
        echo phpinfo(INFO_CONFIGURATION) . "</br>";
        ?>
    </div>


<h3>Exo 2 - Afficher une string simple et une string en échappant les slash</h3>

<?php
// Using anti slash allows to display special character such as ' or \
echo "'Tomorrow I \'ll learn PHP global variables.'" . "</br>" .
    'This is a bad command : del c:\\*.*';

?>

<h3>Exo 3 - Insérer une variable dans du HTML</h3>

<!DOCTYPE html>
<html lang="fr">

<?php
$var = "PHP TUTORIAL";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo 4 Afficher la variable => <?= $var ?></title>
</head>

<body>
    <h3><?= $var ?></h3>
    <a href="#php_tuto"><?= $var ?></a>
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;

    <p id="php_tuto">Ceci est l'endroit vers lequel l'ancre php tuto mène</p>
</body>

</html>
<!-- Exo 4 Formulaire d'envoi du surnom -->
<h3>Exo 4 - Afficher l'input envoyée par la barre de recherche</h3>

<form method="POST" action="exercices.php">
    <label for="username">Your username</label>
    <input type="text" name="username" id="username">
    <button type="submit">Envoyer</button>
</form>

<?php
/*Display the variable stored sent through the POST method */
if (isset($_POST['username']) && !empty($_POST['username'])) {
    $username = $_POST['username'];
    echo $username . "</br>";
};
?>

<!-- Exo 5 Récupérer l'information adresse IP du cient -->
<?php
$clientIP = $_SERVER['HTTP_USER_AGENT'];
?>
<h3>Exo 5 - Affichage du navigateur utilisé par le client</h3>
<?php
echo $clientIP;
?>

<h3>Exo 6 - Affichage des capacités du navigateur client</h3>
<!-- https://w3lessons.info/how-to-get-browser-operating-system-details-with-php -->

<?php
// get browser by default is set as an object at the 2nd paramater of this function. Set the value of the 2nd parameter to true to set the function as an array. 
// Then use print_t to display the content of your array

$displayBrowser = get_browser(null, true);
?>
<button id="btnIdExo6">Afficher</button>
<div id="elementIdExo6" style = "display:none">
    <pre>
<?php
print_r($displayBrowser);
?>
    </pre>
</div>
<script src="index.js"></script>
</body>

</html>

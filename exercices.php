<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercices PHP</title>
</head>

<body>
    <!-- https://www.w3resource.com/php-exercises/php-basic-exercises.php -->

    <h3>Exo 1 - Afficher version PHP et information de configuration</h3>
    <?php

    // Function phpversion only displays the number of version of PHP we are working with
    ?>

    <?php
    echo phpversion() . "</br>";
    ?>
    <button id="btnId">Afficher</button>
    <div id="elementId" style="display:none">
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

    <?php
    $var = "PHP TUTORIAL";
    ?>

    <h3><?= $var ?></h3>
    <a href="#php_tuto"><?= $var ?></a>
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;
    </br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;</br>&#x21D3;

    <p id="php_tuto">Ceci est l'endroit vers lequel l'ancre php tuto mène</p>

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
    <div id="elementIdExo6" style="display:none">
        <pre>
<?php
print_r($displayBrowser);
?>
    </pre>
    </div>

    <h3>Exo 7 - Récupérer le nom du fichier actuel</h3>
    <!-- https://topic.alibabacloud.com/a/the-difference-and-example-of-dirnamebasenamepathinfo-function-in-php_4_86_30941626.html
    A few methods to get the name is to use the function basename or pathinfo or dirname . Basename get the file part in the path while dirname gets the directoty part in the path. As for path info it gets all the info, directoty, file, filename, file extension etc. -->

    <pre>
        <?php
        // Here we do the print_r of method pathinfo because it returns an array or string. This pathinfo can return all info with argument CONSTANT PATHINFO_ALL on 2nd argument. The 1st argument is the path of the file ofc.
        $fileInfo = print_r(pathinfo($path = "C:\wamp64\www\php_practice\\exo\\exercices.php", PATHINFO_ALL)); // displays dirname, extension, filename and basename
        echo "<br>--------<br>";

        echo "Here below is the extension of the running file with the pathingo function with 2nd paramaeter PATHINFO EXTENSION<br>";
        $fileExtension = print_r(pathinfo($path = "C:\wamp64\www\php_practice\\exo\\exercices.php", PATHINFO_EXTENSION)); // displays dirname, extension, filename and basename 
        echo "<br>--------<br>";
        
        $path = "C:\wamp64\www\php_practice\\exo\\exercices.php";
        $fileName = basename($path);
        echo "<br>Here below is the filename returned with basename function <br>" . $fileName;
        echo "<br>--------<br>";
        ?>
    </pre>

    <h3>Exo 8 - Récupérer le nom du fichier actuel</h3>


    <script src="index.js"></script>
</body>

</html>
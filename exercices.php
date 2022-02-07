<!DOCTYPE html>
<html lang="fr">
<h3>Exo 11 - Redirection header location ou Refresh</h3>
<!-- Header is sent after a display request is being displayed. For example after echo instruction. Which is why we put this exo 11 before the HEAD html. Besides, the header location is immediately executed so to avoid this I have used refresh instead and set time to 5 sec before a kind of redirection -->
<?php
header("Refresh:60; exercices.php", TRUE, 307);
?>

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

        // Other possibility $current_file_name = basename($_SERVER['PHP_SELF']);

        echo "<br>Here below is the filename returned with basename function <br>" . $fileName;
        echo "<br>--------<br>";
        ?>
    </pre>

    <h3>Exo 8 - Récupérer le nom du fichier actuel</h3>
    <?php
    $url = "https://www.php.net/manual/fr/function.parse-url.php";
    $url = parse_url("https://www.php.net/manual/fr/function.parse-url.php");
    // When 2nd parameter is filled then the function returns a string therefore we display content with echo instruction.
    // $urlScheme = parse_url($url, PHP_URL_SCHEME); // it's mandatory to specify 1st parameter but not 2nd parameter
    // $urlHost = parse_url($url, PHP_URL_HOST);
    // $urlPath = parse_url($url, PHP_URL_PATH);
    // echo "Scheme <br>" . $urlScheme . "<br>--------<br>";
    // echo "Host <br>" . $urlHost . "<br>--------<br>";
    // echo "Path <br>" . $urlPath . "<br>--------<br>";
    echo "Voici en une seule ligne de code l'affichage respectif des SCHEME, HOST et PATH de l'url <br>" . $url['scheme'] . " et " . $url['host'] . " et " . $url['path']

    // better is to store the url in variable and as it's an array well the values via index like in this proposition
    // $url = 'https://www.w3resource.com/php-exercises/php-basic-exercises.php';
    // $url = parse_url($url);
    // echo 'Scheme : ' . $url['scheme'] . "\n";
    // echo 'Host : ' . $url['host'] . "\n";
    // echo 'Path : ' . $url['path'] . "\n";

    ?>

    <h3>Exo 9 - Changer la couleur de la première lettre</h3>
    <?php

    // Text to replace
    $text = "PHP Tutorial";

    // The preg_replace is used here to replace the
    // color of first character of the word
    $text = preg_replace(
        '/(\b[a-z])/i',
        '<span style="color:green;">\1</span>',
        $text
    );

    // Display the text value
    echo $text
    ?>

    <h3>Exo 10 - Vérifier si la page est appelée depuis une page sécurisée ou non sécurisée</h3>
    <!-- <form action="" method="POST">
    <label for="url">URL à vérifier</label>
        <input type="url" name="url" id="url">
        <button type="submit">Envoyer</button>
    </form>

    // if(isset($_POST['url']) && !empty($_POST['url'])) {
    //     $url= $_POST['url'];
    //     print_r($_SERVER['HTTPS']);
    // } -->

    <?php
    if (!empty($_SERVER['HTTPS'])) {
        echo "La page est bien accédée en HTTPS";
    } else {
        echo "La page n'est pas sécurisée";
    }

    ?>

    <h3>Exo 12 - </h3>
    <form action="" method="POST">
        <label for="email">Votre email</label>
        <input type="email" name="email" id="email">
        <button type="submit" value="send">Envoyer</button>
    </form>
    <?php        
        if (isset($_POST['email'])) {
            $email = $_POST['email'];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "Votre adresse email est elle bien la suivante : " . $email;
            }
        }
    ?>

    <script src="index.js"></script>
</body>

</html>
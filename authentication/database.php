<?php 

try {
    // These data should normally visible but as it's just work on local for test we don't hide, protect it
    $pdo = new PDO('mysql:host=localhost;dbname=authentication_test','root','root', [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    // To get proper error messages without revealing delicate info
    echo $e->getMessage();
}

return $pdo;
<?php


function isLoggedIn()
{
    $pdo = require_once './database.php';

    $sessionId = $_COOKIE['session'] ?? '';
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

    return $user ?? false;
}

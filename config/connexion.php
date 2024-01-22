<?php

try {
    $connexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=quizz",'root','', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $th) {
    die('erreur bdd');
}
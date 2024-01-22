<?php

// Connexion BDD
require_once './config/connexion.php';

// Préparer la requête 
$preparedRequestQuestion= $connexion->prepare(
    "SELECT * FROM question ORDER BY RAND() LIMIT 1"
);
$preparedRequestQuestion->execute();


$question = $preparedRequestQuestion->fetch(PDO::FETCH_ASSOC);

echo $question['content'];
?>


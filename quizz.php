<?php
session_start();
require_once './config/connexion.php';
include_once './partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz Harry Potter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <video id=video autoplay="autoplay" muted="" loop="infinite" src="./media/poud.webm"></video>
   
    <div class="card m-2" style="max-width: 200px;">
        <div class="card-body d-flex align-items-center justify-content-between">
            <h5 class="card-title mb-0">Bonjour <?= $_SESSION['pseudo']; ?></h5>
            <a href="./index.php" class="btn btn-black">
                <i class="fa-solid fa-person-walking-arrow-right"></i>
            </a>
        </div>
    </div>




    <div class="container border border-light border-2 rounded-2 mt-5 p-3 text-center blur">
        <h1>HP Quizz</h1>
    </div>
    <div class="container border border-light border-2 rounded-2 mt-1 mb-3 p-5 blurr">
         <div class="text-white"> SCORE </div>
            <div class="text-white"> <?= $_SESSION['score']; ?> </div>
        <div class="container border border-light border-2 rounded-2 mt-5 mb-5 p-5 text-center blur fs-2">
            <?php include './process/random_question.php' ?>
        </div>
        <div class="container border border-light border-2 rounded-2 mt-5 mb-5 p-5 text-center blur">
            <?php include './process/random_answer.php' ?>
        </div>
    </div>

   
        

    <?php require './partials/footer.php' ?>


</body>
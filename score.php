<?php
session_start();
require_once './config/connexion.php';
include_once './partials/header.php';


$preparedRequestPodium= $connexion->prepare(
    "SELECT * FROM score ORDER BY score DESC LIMIT 3"
);
$preparedRequestPodium->execute();


$podium = $preparedRequestPodium->fetchAll(PDO::FETCH_ASSOC);
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
<video id=video autoplay="autoplay" muted="" loop="infinite" src="./media/scorre.mp4"></video>
    <div class="card m-2" style="max-width: 200px;">
            <div class="card-body d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">Bonjour <?= $_SESSION['pseudo']; ?></h5>
                <a href="./index.php" class="btn btn-black">
                    <i class="fa-solid fa-person-walking-arrow-right"></i>
                </a>
            </div>
        </div>


        <section>
    <div class="player d-flex justify-content-center m-5 text-white">

        <h3 class="fs-1 user-style mt-5"><?= $_SESSION['pseudo'] . ", tu as fait: " . $_SESSION['score'] . " points" ?></h3>
    </div>
</section>

<?php
foreach ($podium as $podium1) { ?>
    <div class="container border border-light border-2 rounded-2 mt-5 p-3 text-center blur"> 
        <h3> <?= $podium1['pseudo']. " a fait: " .$podium1['score'] . "points" ?> </h3>
    </div>
<?php } ?>


</body>


<?php require './partials/footer.php'; ?>
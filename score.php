<?php
session_start();
require_once './config/connexion.php';


$preparedRequestPodium= $connexion->prepare(
    "SELECT * FROM score ORDER BY score DESC LIMIT 3"
);
$preparedRequestPodium->execute();


$podium = $preparedRequestPodium->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
    <div class="player d-flex justify-content-center m-5 text-white">

        <h3 class="fs-1 user-style mt-5"><?= $_SESSION['pseudo'] . ", tu as fait: " . $_SESSION['score'] . " points" ?></h3>
    </div>
</section>

<?php
foreach ($podium as $podium1) { ?>
    <div class="container d-flex justify-content-center""> 
        <h3> <?= $podium1['pseudo']. " a fait: " .$podium1['score'] . "points" ?> </h3>
    </div>
<?php } ?>

<div class="d-flex justify-content-center">
<a href="./index.php"> <i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a>
</div>

<?php require './partials/footer.php'; ?>
<?php

// Connexion BDD
require_once './config/connexion.php';

// Préparer la requête 
$preparedRequestAnswer= $connexion->prepare(
    "SELECT * FROM answer WHERE question_id = " .$question['id'] );
$preparedRequestAnswer->execute();

$answers = $preparedRequestAnswer->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container text-center">
    <div class="">
        <form id="prout" action="./process/process_score.php" method="post" class="row" >
            <?php foreach ($answers as $answer): ?>
                <div class="col-md-6" data-key="<?= $answer['good_answer']; ?>">
                    <button name="answer" type="submit" value="<?= $answer["id"] ?>" onclick="submitWithDelay(event, 2000)" class="btn btn-dark btn-lg mb-2 w-100 answer"><?= $answer['content']; ?></button>
                </div>
            <?php endforeach; ?>
        </form>
    </div>  
</div>

<script>
    function submitWithDelay(event, delay) {
        event.preventDefault(); // Je stope la propagation de l'événement 
        setTimeout(async function () {
            console.log(event)
            let formData = new FormData()
            formData.append('answer', event.target.value)

            let response = await fetch('./process/process_score.php', {
                method : "POST",
                body: formData
            })
            const data = await response.json();
            console.log(data);
            window.location.href = data.redirectTo
        }, delay);
    }
</script>

















 

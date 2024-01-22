<?php
session_start();


if (!empty($_POST['answer'])) {

    require_once '../config/connexion.php';

    $preparedRequest = $connexion->prepare(
        "SELECT * FROM answer 
        WHERE answer.id = ? 
        "
    );
    $preparedRequest->execute([
        $_POST['answer']
    ]);

    $answer = $preparedRequest->fetch(PDO::FETCH_ASSOC);
    
    $_SESSION['nb_question']++;

    if ($answer['good_answer']) {
        // J'ajoute les points
        $_SESSION['score'] = $_SESSION['score'] + 1;
    }



    if (isset($_SESSION['nb_question']) && $_SESSION['nb_question'] >= 10) {
        $insertscore = $connexion->prepare("INSERT INTO score (pseudo, score, user_id) VALUES (?,?,?)");
        $insertscore->execute([

            $_SESSION['pseudo'],
            $_SESSION['score'],
            $_SESSION['id'],
        ]);
        echo json_encode(['message' => "quizz fini", "redirectTo" => 'score.php']);
    }else{
        echo json_encode(['message' => "continue ton quizz", "redirectTo" => 'quizz.php']);
    }

}

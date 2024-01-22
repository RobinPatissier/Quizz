<?php
session_start();
 
require_once '../config/connexion.php';

$preparedRequest = $connexion->prepare(
    "SELECT * FROM user
    WHERE pseudo =  ?  OR email = ? "
);


$preparedRequest->execute([
            $_POST["pseudo"],
            $_POST["email"]
        ]);
$verifyUser = $preparedRequest->fetch(PDO::FETCH_ASSOC);


if (!empty($_POST['email'])
    && !empty($_POST['pseudo'])
    && !empty($_POST['password'])
    && !$verifyUser ) {
        
        require_once '../config/connexion.php';

        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $preparedRequestCreateUser = $connexion->prepare(
            "INSERT INTO user (`pseudo`, `password`, `email`) VALUES (?,?,?)"
        );
        // Execute la requete pour inserer le user 
        $preparedRequestCreateUser->execute([
            $_POST["pseudo"],
            $hashed_password,
            $_POST["email"]
        ]);

        $_SESSION['id'] = $connexion->lastInsertId();
        $_SESSION['pseudo'] = $_POST["pseudo"];
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['score'] = 0;
        $_SESSION['nb_question']=0;

        header('Location: ../quizz.php?success=Votre compte a bien été créé !');
}else if ($verifyUser){
    header('Location: ../index.php?error=Deja inscrit !');
}
else{
    header('Location: ../index.php?error=Erreur dans la création du compte');

}
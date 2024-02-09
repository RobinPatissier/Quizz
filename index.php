<?php
include_once './config/debug.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>


<body>


    <video id=video autoplay="autoplay" muted="" loop="infinite" src="./media/poud2.webm"></video>
    <div class="container mt-5 pt-5 align-self-center" id="test">
        <div class="row mt-5 pt-5 text-center">
       
    


            <section class="container border border-light col mx-5 p-5 rounded-5 blur">
                <h1>Créer un compte</h1>
                <form action="./process/process_register.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="pierrepaul@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo</label>
                        <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="pseudo">
                    </div>
                    <a href="./quizz.php"> <button type="submit" class="btn btn-dark">Créer un compte</button> </a>
                </form>
            </section>


            <section class="container border border-light col p-5 rounded-5 blur">
                <h1>Connexion</h1>
                <form action="./process/process_login.php" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label pt-4">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="pierrepaul@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                    </div>
                    <a href="./quizz.php"> <button type="submit" class="btn btn-dark">Connexion</button> </a>
                </form>
            </section>
        </div>
    </div>


</body>

</html>
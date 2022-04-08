<?php
    session_start();
    require('../../session/library.php');
    redirection_login();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Profil</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container top">
        <h1>Welcome, <?php echo $_SESSION['user']->username; ?>!</h1> <br>
        <h2>Your profile:</h2> <hr>
        <div class="row">
            <div class="col-4">Username:</div>
            <div class="col-8"><?php echo $_SESSION['user']->username; ?></div>
        </div> <hr>
        <div class="row">
            <div class="col-4">Signup date:</div>
            <div class="col-8"><?php echo $_SESSION['user']->date_inscription; ?></div>
        </div> <hr>
        <div class="row">
            <div class="col-4">Last login:</div>
            <div class="col-8"><?php echo $_SESSION['user']->date_connexion; ?></div>
        </div>
    </div>
</body>
</html>
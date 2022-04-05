<?php
    session_start();
    require('../../session/library.php');
    redirection_admin();
    require('../database/models/utilisateur.php');
    $status = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = htmlspecialchars($_POST['username']) ?? "";
        $password = htmlspecialchars($_POST['password']) ?? "";
        $password = hash("md5", $password);
        $utilisateur = new Utilisateur();
        if($utilisateur->addUser($username, $password) == "bien"){
            $user = $utilisateur->getUserByUsernameAndPassword($username, $password);
            date_default_timezone_set('UTC');
            $user->date_connexion = date('l jS \of F Y h:i:s A');
            $_SESSION['user'] = $user;
            header("Location: profil.php");
        }else{
            $status = "Username already exist !!";
        }
    }
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
    <title>Sign Up</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9 col-10 top">
                <h1 class="text-center">Sign up</h1> <br>
                <?php if($status != ""){ ?>
                    <div class="alert alert-danger">
                        <?php echo $status; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username">
                        <div id="error1" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                        <div id="error2" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password2" class="form-label">Password verify</label>
                        <input type="password" class="form-control form-control-lg" id="password2" placeholder="Password verify" name="password2">
                        <div id="error3" class="invalid-feedback"></div>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit">Sign up</button>
                    </div>
                </form> <br>
                <p>Already have an account? <a href="login.php">Login</a> here.</p>
            </div>
        </div>
    </div>
    <script src="../js/signup.js"></script>
</body>
</html>
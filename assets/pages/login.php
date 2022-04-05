<?php
    session_start();
    $status = "";
    require('../../session/library.php');
    redirection_admin();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = htmlspecialchars($_POST['username']) ?? "";
        $password = htmlspecialchars($_POST['password']) ?? "";
        if(authenticate($username, hash("md5", $password))){
            header("Location: profil.php");
        }else{
            $status = "incorect username or password !!";
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
    <title>Login</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-9 col-10 top">
                <h1 class="text-center">Authenticate</h1> <br>
                <?php if($status != ""){ ?>
                    <div class="alert alert-danger">
                        <?php echo $status; ?>
                    </div>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input required type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="submit">Login</button>
                    </div>
                </form> <br>
                <p>No account? <a href="signup.php">Sign up</a> here.</p>
            </div>
        </div>
    </div>
</body>
</html>
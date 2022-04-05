<header>
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="index.php" class="navbar-brand">Contacts list</a>
    <div class="d-flex">
        <?php
        if(is_authenticate()){ ?>
        <a class="nav-link text-white-50" href="profil.php"><?php echo $_SESSION['user']->username; ?></a>
        <a class="nav-link text-white-50" href="contacts.php">Contacts</a>
        <a class="nav-link text-white-50" href="logout.php">Logout</a>
        <?php }else{ ?>
          <a class="nav-link text-white-50" href="login.php">Login</a>
        <?php } ?>
    </div>
    </div>
  </nav>
</header>
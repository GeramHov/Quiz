<?php
  session_start();
  include_once('traitements/config.php');
  if(isset($_SESSION['pseudo'])){
    $pseudo = $_SESSION['pseudo'];
  } else {
    $pseudo = '';
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark">
      <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav mr-auto mx-5">
              <li class="nav-item active">
                  <a class="nav-link p-0" href="index.php">
                    <img src="IMAGES/Quiz.png" alt="logo" width="80" height="40">
                  </a>
              </li>
          </ul>
      </div>
      <div class="mx-auto order-0">
        <div class="dropdown">
            <a class="navbar-brand mx-auto" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="IMAGES/user.png" alt="user" width="30" height="30">
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="profile.php">Profil</a></li>
                <li><a class="dropdown-item" href="login.php">Connexion</a></li>
                <li><a class="dropdown-item" href="traitements/user_logout.php">Sortie</a></li>
              </ul>
        </div>
          
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      <div class="navbar-collapse collapse order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto mx-5">
              <li class="nav-item">
                  <a class="nav-link" href="profile.php">
                    <?php echo $pseudo; ?>
                  </a>
              </li>
          </ul>
      </div>
</nav>





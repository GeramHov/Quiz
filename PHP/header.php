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
    <div id="burgermenu" class="flex-column justify-content-center align-items-center text-start">
        <div class="col d-flex justify-content-center my-5">
        <img class="rounded-5" src="<?php 
                if(isset($_SESSION['avatar'])) {
                  echo $_SESSION['avatar']; 
                } else {
                  echo 'IMAGES/user.png';
                }
                ?>" alt="avatar" width="50" height="50">
        </div>
        
        <div class="col d-flex justify-content-center my-4">
        <?php 
                  if(isset($_SESSION['pseudo'])){
                    echo ' <hr><a class="display-5" style="text-decoration: none; color:white; font-size: 30px" href="profile.php">Profil</a>
                     ';
                  }
                ?>
        </div>
        <hr>
        <div class="col d-flex justify-content-center my-4">
              <a style="text-decoration: none; color:white; font-size: 30px" href="login.php">Connexion</a>
        </div>
        <hr>
        <div class="col d-flex justify-content-center my-4">
              <a class="display-5" style="text-decoration: none; color:white; font-size: 30px" href="traitements/user_logout.php">Quitter</a>
        </div>
        <hr>
        <div class="col d-flex justify-content-center my-4">
        <a class="nav-link p-0" href="index.php">
                    <img src="IMAGES/Quiz.png" alt="logo" width="80" height="40">
                  </a>
        </div>
        <div class="col d-flex justify-content-start mt-5">
              <p class="ms-3" style="color: white"><i> Gueram & Renaud partnership <br> All rights reserved ©  2023</i></p>
        </div>
    </div>


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
                <img class="rounded-5" src="<?php 
                if(isset($_SESSION['avatar'])) {
                  echo $_SESSION['avatar']; 
                } else {
                  echo 'IMAGES/user.png';
                }
                ?>" alt="user" width="40" height="40">
              </a>
              <ul class="dropdown-menu">
                <?php 
                  if(isset($_SESSION['pseudo'])){
                    echo 
                          ' <li><a class="dropdown-item" href="profile.php">Profil</a></li> ';
                  }
                ?>
                <li><a class="dropdown-item" href="login.php">Connexion</a></li>
                <li><a class="dropdown-item" href="traitements/user_logout.php">Quitter</a></li>
              </ul>
        </div>
          
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      <div class="navbar-collapse collapse order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto mx-5">
              <li class="nav-item">
                  <a class="nav-link active" href="profile.php">
                    <?php echo $pseudo; ?>
                  </a>
              </li>
          </ul>
      </div>
</nav>
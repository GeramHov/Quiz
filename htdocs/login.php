<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
?>

<div class="container text-ceneter d-flex justify-content-center my-5">
    <h2 style="color:white">
        Bienvenue!
    </h2>
</div>
<div class="container text-ceneter d-flex justify-content-center">
    <h3 style="color:white">
        Veuillez entrer votre pseudo existant
    </h3>
</div>
<div class="container text-ceneter d-flex justify-content-center my-5">
    <form action="traitements/user_login.php" method="get">
        <input type="text" name="pseudo" placeholder="votre pseudo ici">
        <button class="btn btn-primary" type="submit">Soumettre</button>
    </form>
</div>
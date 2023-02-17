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

<div class="container text-center d-flex justify-content-center my-5">
    <form action="traitements/user_login.php" method="get">
        <input class="rounded-4" type="text" style="width: 20vw; height: 4vh" name="pseudo" placeholder="" value="<?php if(isset($_GET['pseudo'])){ echo $_GET['pseudo'];}?>"> <br> <br>
        <button class="btn btn-success rounded-0" style="height: 45px; width: 120px" type="submit">Soumettre</button>
    </form>
</div>
<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
?>
    <div class='container text-center my-5 pe-5'>
        <h1 style='color:white'>Bienvenue à notre coding <span>
            <img src='IMAGES/Quiz.png' alt='logo'>
            </span>  ...
        </h1>
    </div>

    <div class='container text-center mt-5 d-flex justify-content-center'>
        <h4 class="m-1" style='color:white'>
            Vous êtes nouveau ? Veuillez <strong><u>entrer votre pseudo</u></strong> et <strong><u>choisir un avatar</u></strong> pour commencer le quiz
        </h4>
    </div>

<?php

//formulaire pseudo

isset($_GET['login'])? $placeholder="&nbsp;&nbsp;Pseudo existant" : $placeholder="&nbsp;&nbsp;Votre Pseudo ici";
echo "
    <div class='container text-center mt-5 d-flex justify-content-center'>
        <form class='formcontrol signUpForm' action='traitements/user_signup.php' method='get'>
            <input class='rounded-4' style='width: 20vw; height: 4vh' type='text' name='pseudo' placeholder='{$placeholder}' required> <br><br>
";

// formulaire avatar

            for ($i=1; $i <= 10; $i++) { 
                echo "
                    <input class='avatarInputs' type='radio' name='avatar' id='avatar{$i}' value='avatars/avatar_{$i}.jpg' required>
                    <label class='avatarLabels m-1' for='avatar{$i}'><img src='avatars/avatar_{$i}.jpg' alt=''></label>
                ";  
            }
            echo "<br><br>";



// bouton submit

echo "
            <button class='btn btn-success rounded-0' style='height: 45px; width: 120px' type='submit'>Soumettre</button>
        </form>
    </div>
";
?>

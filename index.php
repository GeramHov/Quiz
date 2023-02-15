<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
?>

<?php
    if(!isset($_SESSION['pseudo'])) {
        isset($_GET['login'])? $placeholder="Pseudo existant" : $placeholder="Nom";
        echo "
        <div class='container text-center my-5 pe-5'>
        <h1 style='color:white'>Bienvenue à notre coding <span>
            <img src='IMAGES/Quiz.png' alt='logo'>
        </span>  ...</h1>
     </div>
    
    <div class='container text-center mt-5 d-flex justify-content-center'>
        <h4 style='color:white'>
            Vous êtes nouveau ? Veuillez entrer votre pseudo pour commencer le quiz :
        </h4>
        <form action='traitements/signup.php' method='get'>
            <input type='text' name='pseudo' placeholder='{$placeholder}'>
            <button class='btn btn-primary' type='submit'>Soumettre</button>
        </form>
    </div>
    <div class='container text-center d-flex justify-content-end pe-5'>
    <p style='color:white'>Votre pseudo existe déja? &nbsp;&nbsp;&nbsp;</p>
    <a style='color:white' href='login.php'>Connectez-vous ici</a>
    </div>
        ";
    } else {
        echo '
        <div class="container text-center my-5 d-flex justify-content-center">
            <h3 style="color:white" class="my-3">Choissisez votre thème en dessous</h3>
        </div>
        
        <section id="questions" class="container text-center my-5 d-flex "> ';
                if (!isset($_GET['theme'])){
                    include_once ('./traitements/choicesEcho.php'); 
                } else {
                    $_SESSION['theme'] = $_GET['theme'];
                    $_SESSION['count'] = 0;
                    $_SESSION['questions'] = [];
                    $_SESSION['score'] = 0;
                    echo "
                    <div class='container text-center my-5'>
                        <h4 style='color:white'>
                            Vous avez choisi le Quiz {$_SESSION['theme']}
                        </h4>
                        <div class='container text-center d-flex justify-content-center my-5'>
                        <div class='row'>
                        <div class='col'>
                            <form action='../quizpage.php'>
                            <button class='btn btn-primary' type='submit' value='Confirmer'>Confirmer</button>
                            </form>
                        </div>
                        <div class='col'>
                            <form action='../traitements/choicesEcho.php' method='get'>
                            <input type='hidden' name='theme' value='destroy'>
                            <button class='btn btn-danger' type='submit' value='Annuler'>Annuler</button>
                            </form>
                        </div>
                        </div>
                        </div>
                    </div>
                        ";}
    
       echo' </section>
            ';
    }
?>


<?php
    include_once('PHP/script.php');
?>

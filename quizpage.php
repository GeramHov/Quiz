<?php
    include_once('PHP/header.php');
    include_once('PHP/script.php');
?>

<?php

// Initialisation du tablau de 10 questions s'il n'existe pas

if(count($_SESSION['questions']) == 0){
  require_once('./traitements/config.php');

  $query = $db->prepare(" SELECT DISTINCT * FROM questions 
                          WHERE theme = :theme
                          ORDER BY RAND()
                          LIMIT 10");
  $query -> execute(['theme' => $_SESSION['theme']]);
  $_SESSION['questions'] = $query->fetchAll();
  }

// initialistaion de variables utiles à l'affichage

$questionNumberView = $_SESSION['count'] + 1;
isset($_GET['nextDisplay'])? ($nextDisplay = 'hidden') : ($nextDisplay = 'none');
isset($_GET['nextDisplay'])? ($nextDisplayTimer = 'none') : ($nextDisplayTimer = 'hidden');
$a1_color = isset($_GET['a1'])? (($_GET['a1'] == 'success')? 'success' : 'danger') : 'dark';
$a2_color = isset($_GET['a2'])? (($_GET['a2'] == 'success')? 'success' : 'danger') : 'dark';
$a3_color = isset($_GET['a3'])? (($_GET['a3'] == 'success')? 'success' : 'danger') : 'dark';
$a4_color = isset($_GET['a4'])? (($_GET['a4'] == 'success')? 'success' : 'danger') : 'dark';

//Affichage des questions si count <10

if ($_SESSION['count'] < 10){
  $currentTime = time();

  //Timer 

  if (!isset($_GET['timer'])){

    // clique sur réponse fausse au bout de x secondes

    echo "
      <form action='./traitements/answerToScore.php' method='get' style='display:none'>
        <input type='text' name='time' value='{$currentTime}'>
        <input style='display:none' name='answer' value='a5'>
        <input  name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
        <button class='defaultButton' id='a5' type='submit'></button>
      </form>
      <script> 
        setTimeout(maFonction, 10000); 
        function maFonction() {   
              let defaultButton = document.querySelector('.defaultButton');
              defaultButton.click()
        } 
      </script>
    ";
  };

  echo "
    <div id='currentscore' class='flex-column justify-content-center text-center mb-4'>

      <div id='questionNumberView'>
        <h3 style='color:white'>
          Question {$questionNumberView}/10
        </h3>
      </div>

      <div id='scoreView'>
        <h3 style='color:white'>
          Score = {$_SESSION['score']}
        </h3>
      </div>

    </div>

    <div id='question' class='container bg-light d-flex justify-content-center align-items-center text-center my-3'>
      <h3>
        {$_SESSION['questions'][$_SESSION['count']]['question']}
      </h3>
    </div>

    <div id='answer' class='container text-center d-flex flex-wrap justify-content-center align-items-center'>
  
      <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
        <input type='hidden' name='time' value='{$currentTime}'>
        <input style='display:none' type='hidden' name='answer' value='a1'>
        <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
        <button class='bg-light text-{$a1_color} border border-3 border-{$a1_color}' id='a1' type='submit'>
          <p>
            {$_SESSION['questions'][$_SESSION['count']]['a1']}
          </p>
        </button>
      </form>

      <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
        <input type='hidden' name='time' value='{$currentTime}'>  
        <input type='hidden' name='answer' value='a2'>
        <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
        <button class='bg-light text-wrap text-{$a2_color} border border-3 border-{$a2_color}' id='a2' type='submit'>
          <p>
            {$_SESSION['questions'][$_SESSION['count']]['a2']}
          </p>
        </button>
      </form>

      <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
        <input type='hidden' name='time' value='{$currentTime}'>
        <input type='hidden' name='answer' value='a3'>
        <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
        <button class='bg-light text-{$a3_color} border border-3 border-{$a3_color}' id='a3' type='submit'>
          <p>
            {$_SESSION['questions'][$_SESSION['count']]['a3']}
          </p>
        </button>
      </form>

      <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
        <input type='hidden' name='time' value='{$currentTime}'>
        <input type='hidden' name='answer' value='a4'>
        <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
        <button class='bg-light text-{$a4_color} border border-3 border-{$a4_color}' id='a4' type='submit'>
          <p>
            {$_SESSION['questions'][$_SESSION['count']]['a4']}
          </p>
        </button>
      </form>
    </div>

    <div class='container d-flex justify-content-center my-1'>
      <form action='./traitements/answerToScore.php' method='get' style='display:{$nextDisplay}'>
        <input type='hidden' name='answer' value='next'> <br>
        <button id='nexbutton' style='margin-left:6vw; height: 60px; width: 150px' type='submit' class='btn btn-success p-2 rounded-0'>Suivant >></button>
      </form>
    </div>
  ";

  // div avec animation css "timer"

  echo "
    <div class='containerTimer container d-flex justify-content-center my-1' >
      <div class='progressTimer verticalTimer' style='display:{$nextDisplayTimer}'>
        <div class='progress-barTimer progress-bar-info' role='progressbar'>
        </div>  
      </div>
    </div>
  ";

} else {

  // fin du questionnaire : enregistrement du score et retour à l'index
  
  require_once('./traitements/config.php');
  $query = $db->prepare(" INSERT INTO scores (score, user_id, date, questions_theme)
                          VALUES (:score, :user_id, NOW(), :theme)");
  $query -> execute ([
                      'score' => $_SESSION['score'],
                      'user_id' => $_SESSION['user_id'],
                      'theme' => $_SESSION['theme']
                    ]);
  
    if($_SESSION['score'] == 0){
        echo "
          <div class='container text-center'>
            <div class='col my-5'>
            <img src='IMAGES/sad.png' alt='sad' width='120' height='120'>
                <h2 style='color:white' class='my-5'>
                   Vous avez obtenu {$_SESSION['score']} point ...  Entrainez-vous avec coding WWE champion du monde <strong> Aleeeeeexandre Loretzin Suuuuperslaam </strong>!
                </h2>
            </div>
          </div>
          <div class='col d-flex justify-content-center'>
          <a style='text-decoration:none' href='./index.php'>
            <button class='btn btn-success rounded-0' style='height: 45px; width: 150px'>
              Retour à l'accueil
            </button>
          </a>
        </div>
        ";
    }  elseif($_SESSION['score'] < 61) {
      echo "
      <div class='container text-center'>
        <div class='col my-5'>
          <img src='IMAGES/notbad.jpg' alt='notbad' width='350' height='350'>
          <h4 style='color:white' class='my-5'>
            Vous avez obtenu {$_SESSION['score']} points ! Entrainez vos skillz avec < Garage 404 >
          </h4>
        </div>
      </div>
      <div class='col d-flex justify-content-center'>
        <a style='text-decoration:none' href='./index.php'>
          <button class='btn btn-success rounded-0' style='height: 45px; width: 150px'>
            Retour à l'accueil
          </button>
        </a>
      </div>
  ";
    } elseif($_SESSION['score'] < 81){
      echo "
      <div class='container text-center'>
        <div class='col my-5'>
          <img src='IMAGES/good.gif' alt='good' width='350' height='350'>
          <h4 style='color:white' class='my-5'>
            Bravo vous avez obtenu {$_SESSION['score']} points ! < Garage 404 > rulez!
          </h4>
        </div>
      </div>
      <div class='col d-flex justify-content-center'>
        <a style='text-decoration:none' href='./index.php'>
          <button class='btn btn-success rounded-0' style='height: 45px; width: 150px'>
            Retour à l'accueil
          </button>
        </a>
      </div>
  ";
    }
    
    else {
      echo "
        <div class='container text-center'>
          <div class='col'>
          <script src='https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js'></script>
          <lottie-player class='container text-center' src='https://assets10.lottiefiles.com/packages/lf20_laGIqKVpcD.json'  background='transparent'  speed='1'  style='width: 400px; height: 400px;' loop autoplay></lottie-player>
            <h4 style='color:white'>
              Bravo, vous avez obtenu {$_SESSION['score']} points ! Flawless victory!
            </h4>
          </div>
        </div>
        <div class='col d-flex justify-content-center'>
          <a style='text-decoration:none' href='./index.php'>
            <button class='btn btn-success rounded-0' style='height: 45px; width: 150px'>
              Retour à l'accueil
            </button>
          </a>
        </div>
    ";
    }
};

?>

<?php
  include_once('PHP/script.php');
?>
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
isset($_GET['nextDisplay'])? $nextDisplay = 'block' : $nextDisplay = 'none';
$a1_color = isset($_GET['a1'])? (($_GET['a1'] == 'success')? 'success' : 'danger') : 'dark';
$a2_color = isset($_GET['a2'])? (($_GET['a2'] == 'success')? 'success' : 'danger') : 'dark';
$a3_color = isset($_GET['a3'])? (($_GET['a3'] == 'success')? 'success' : 'danger') : 'dark';
$a4_color = isset($_GET['a4'])? (($_GET['a4'] == 'success')? 'success' : 'danger') : 'dark';

//Affichage des questions si count <10
if ($_SESSION['count'] < 10){
  echo "
  <div id='question' class='container bg-light text-center d-flex justify-content-center align-items-center text-center my-3'>
    <h3>
      {$_SESSION['questions'][$_SESSION['count']]['question']}
    </h3>
  </div>

  <div id='answer' class='container text-center d-flex flex-wrap justify-content-center align-items-center'>
    
    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
      <input style='display:none' type='hidden' name='answer' value='a1'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light text-{$a1_color} border border-3 border-{$a1_color}' id='a1' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a1']}
      </p>
      </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center mt-4' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a2'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light text-{$a2_color} border border-3 border-{$a2_color}' id='a2' type='submit'>
      <p>
      {$_SESSION['questions'][$_SESSION['count']]['a2']}
      </p>
    </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a3'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light text-{$a3_color} border border-3 border-{$a3_color}' id='a3' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a3']}
      </p>
      </button>
    </form>

    <form class='col col-lg-6 col-md-6 col-sm-6 align-items-center text-center' action='./traitements/answerToScore.php' method='get'>
      <input type='hidden' name='answer' value='a4'>
      <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
      <button class='bg-light text-{$a4_color} border border-3 border-{$a4_color}' id='a4' type='submit'>
      <p>
        {$_SESSION['questions'][$_SESSION['count']]['a4']}
      </p>
      </button>
    </form>


  </div>

  <div class='flex-column justify-content-center text-center my-3'>
    <div id='questionNumberView'>
      <h4>
        Question {$questionNumberView}/10
      </h4>
    </div>

    <div id='scoreView'>
      <h4>
        Score = {$_SESSION['score']}
      </h4>
    </div>
  </div>

  <div class='container d-flex justify-content-end my-2'>
    <div class='wrapper'>
      <form action='./traitements/answerToScore.php' method='get' >
        <input type='hidden' name='answer' value='next'>
        <button type='submit' class='btn btn-primary p-2' style='display:{$nextDisplay}'><span>Suivant >> </span></button>
      </form>
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


  echo "
    <div class='container text-center my-5'>
      <div class='col'>
        <h4 style='color:white'>
          Bravo, vous avez obtenu {$_SESSION['score']} points !
        </h4>
      </div>
    </div>
    <div class='col d-flex justify-content-center'>
      <a style='text-decoration:none' href='./index.php'>
        <button class='btn btn-primary'>
          Retour à l'accueil
        </button>
      </a>
    </div>
  ";
};

?>

<?php
  include_once('PHP/script.php');
?>
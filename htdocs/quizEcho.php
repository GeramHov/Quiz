<?php session_start()?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz <?=$_SESSION['theme']?></title>
</head>
<body>


    <?php
    if (!isset($_SESSION['questions']) || $_SESSION['questions'] == null){
    require_once('./traitements/connexionToDB.php');

    $query = $db->prepare(" SELECT * FROM questions 
                            WHERE theme = :theme
                            ORDER BY RAND()
                            LIMIT 10");
    $query -> execute(['theme' => $_SESSION['theme']]);
    $_SESSION['questions'] = $query->fetchAll();
    }

    $questionNumberView = $_SESSION['count'] + 1;

    if ($_SESSION['count'] < 10){
        echo "
        <h2>{$_SESSION['questions'][$_SESSION['count']]['question']}</h2>
        <form action='./traitements/answerToScore.php' method='get'>
            <input type='hidden' name='answer' value='a1'>
            <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
            <input type='submit' value='{$_SESSION['questions'][$_SESSION['count']]['a1']}'>
        </form>
        <form action='./traitements/answerToScore.php' method='get'>
            <input type='hidden' name='answer' value='a2'>
            <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
            <input type='submit' value='{$_SESSION['questions'][$_SESSION['count']]['a2']}'>
        </form>
        <form action='./traitements/answerToScore.php' method='get'>
            <input type='hidden' name='answer' value='a3'>
            <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
            <input type='submit' value='{$_SESSION['questions'][$_SESSION['count']]['a3']}'>
        </form>
        <form action='./traitements/answerToScore.php' method='get'>
            <input type='hidden' name='answer' value='a4'>
            <input type='hidden' name='id' value='{$_SESSION['questions'][$_SESSION['count']]['id']}'>
            <input type='submit' value='{$_SESSION['questions'][$_SESSION['count']]['a4']}'>
        </form>
        <div id='questionNumberView'>
        Question {$questionNumberView}/10;
        </div>
        <div id='scoreView'>
        Score = {$_SESSION['score']};
        </div>
        ";
    } else {
        echo"Bravo, vous avez obtenu {$_SESSION['score']} points !";
        echo"<a href='./index.php'>Retour à l'accueil</a>";
    };
    

    ?>

    
    
</body>
</html>
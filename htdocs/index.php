<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>QUIZ</h1>
    <section id="questions">
        <?php
        if (isset($_SESSION)){
            $_SESSION['questions'] = "";
        }
        if (!isset($_GET['theme'])){
            include_once ('./traitements/choicesEcho.php'); 
        } else {
            $_SESSION['theme'] = $_GET['theme'];
            $_SESSION['count'] = 0;
            $_SESSION['score'] = 0;
            echo "vous avez choisi le Quiz {$_SESSION['theme']}";
            echo '
                <form action="../traitements/choicesEcho.php" method="get">
                    <input type="hidden" name="theme" value="destroy">
                    <input type="submit" value="Annuler">
                </form>
                <form action="../quizEcho.php">
                    <input type="submit" value="Confirmer">
                </form>';
        }


        ?>
    </section>

    <section>
        <a href="./fullfilizer.php">Remplir la DB 'questions'</a>
    </section>


    
</body>
</html>
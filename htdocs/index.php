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
            if (!isset($_COOKIE['theme'])){
                include_once ('./traitements/choicesEcho.php');
            }
        ?>
    </section>

    <section>
        <a href="./fullfilizer.php">Remplir la DB 'questions'</a>
    </section>
    
</body>
</html>
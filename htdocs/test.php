<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php        
        require_once('./traitements/connexionToDB.php');
        $request = $db->query("   SELECT *
                                  FROM questions");
        $questions = $request->fetchAll();
        // var_dump($questions);
        foreach ($questions as $question) {
            // var_dump($question);
            echo"
            
            HELLO WORLD
            {$question['question']}<br>
            {$question['a1']}<br>
            {$question['a2']}<br>
            {$question['a3']}<br>
            {$question['a4']}<br>
            ";
        };
        ?>
</body>
</html>

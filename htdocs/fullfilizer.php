<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Remplir la DB questions</h1>

    <form action="fullfilizer.php" method='get'>
        <label for="theme">Choose a theme :</label>
        <select name="theme" required="required">
            <option value="HTML-CSS">HTML-CSS</option>
            <option value="JavaScript">JavaScript</option>
            <option value="PHP">PHP</option>
        </select>
        <br>
        <label for="question">Question :</label>
        <input type="text" name = "question" required="required">
        <br>
        <label for="true_answer">True_answer :</label>
        <input type="text" name = "true_answer" required="required">
        <br>
        <label for="a1">A1 :</label>
        <input type="text" name = "a1" required="required">
        <br>
        <label for="a2">A2 :</label>
        <input type="text" name = "a2" required="required">
        <br>
        <label for="a3">A3 :</label>
        <input type="text" name = "a3" required="required">
        <br>
        <label for="a4">A4 :</label>
        <input type="text" name = "a4" required="required">
        <br>
        <input type="submit" values="Valider">

    </form>

    <?php
    //Enregistrement du formulaire sur la DB
    if (isset($_GET) && $_GET){
        require_once('./traitements/connexionToDB.php');
        $request = $db->prepare("   INSERT INTO questions 
                                    (theme, question, true_answer, a1, a2, a3, a4)
                                    VALUES ( :theme, :question, :true_answer, :a1, :a2,:a3, :a4)");
        $request->execute([
            ':theme' => $_GET['theme'], 
            ':question' => $_GET['question'],
            ':true_answer' => $_GET['true_answer'],
            ':a1' => $_GET['a1'],
            ':a2' => $_GET['a2'],
            ':a3' => $_GET['a3'],
            ':a4' => $_GET['a4']
        ]);
    }
    ?>
    
</body>
</html>
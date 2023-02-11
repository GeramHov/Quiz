<?php
if (!isset($_GET['theme'])){
    echo '
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="HTML-CSS">
            <input type="submit" value="HTML-CSS">
        </form>
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="JavaScript">
            <input type="submit" value="JavaScript">
        </form>
        <form action="./traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="PHP">
            <input type="submit" value="PHP">
        </form>
    ';
} else {
    switch ($_GET['theme']) {
        case "HTML-CSS":
            setcookie("theme", "HTML-CSS");
            echo "Cookie['theme'] = 'HTML-CSS' créé avec succès <br>";
            echo '<form action="../traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="destroy">
            <input type="submit" value="annuler">
        </form>';
            break;
        case "JavaScript":
            setcookie("theme", "JavaScript");
            echo "Cookie['theme'] = 'HTML-CSS' créé avec succès <br>";
            echo '<form action="../traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="destroy">
            <input type="submit" value="annuler">
        </form>';
            break;
        case "PHP":
            setcookie("theme", "PHP");
            echo "Cookie['theme'] = 'HTML-CSS' créé avec succès <br>";
            echo '<form action="../traitements/choicesEcho.php" method="get">
            <input type="hidden" name="theme" value="destroy">
            <input type="submit" value="annuler">
        </form>';
            break;
        case "destroy":
            setcookie("theme");
            header('Location:../index.php');
            break;
    }
    
}
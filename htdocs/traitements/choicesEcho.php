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
        case "HTML-CSS" :
            header('Location:../index.php?theme=HTML-CSS');
            break;
        case "JavaScript":
            header('Location:../index.php?theme=JavaScript');
            break;
        case "PHP":
            header('Location:../index.php?theme=PHP');
            break;
        case "destroy":
            unset($_GET['theme']);
            header('Location:../index.php');
            break;
    }
    
}
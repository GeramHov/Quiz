<?php

// Page affichant le choix de thème de quizz s'il n'est pas déjà dans l'url

if (!isset($_GET['theme'])){
    echo '
        <div id="logos" class="row mt-5">
            <div class="col col-lg-4 col-md-4 col-sm-4">
                <form action="./traitements/choicesEcho.php" method="get">
                    <input type="hidden" name="theme" value="HTML-CSS">
                    <button class="themebutton" type="submit" value="HTML-CSS">
                    <img src="IMAGES/coding.png" alt="" height="120" width="120">
                    </button>
                </form>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-4">
                <form action="./traitements/choicesEcho.php" method="get">
                <input type="hidden" name="theme" value="JavaScript">
                <button class="themebutton" type="submit" value="JavaScript">
                <img src="IMAGES/js.png" alt="" height="120" width="120">
                </button>
                </form>
            </div>
            <div class="col col-lg-4 col-md-4 col-sm-4">
                <form action="./traitements/choicesEcho.php" method="get">
                <input type="hidden" name="theme" value="PHP">
                <button class="themebutton" type="submit" value="PHP">
                <img src="IMAGES/php.png" alt="" height="120" width="120">
                </button>
                </form>
            </div>
        </div>
    ';
} else {
    // Si le thème est dans l'url on demande confirmation
    // Si l'option choisie est d'annuler on reset le GET dans l'url
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
?>
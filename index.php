<?php
include_once('PHP/header.php');
include_once('PHP/script.php');
?>

<?php
// Accueil si user non-enregistré
if(!isset($_SESSION['pseudo'])) {
    isset($_GET['unknow'])? $placeholder='Nom inconnu : reessayez !' : $placeholder='Votre pseudo ici';

    echo "
        <div class='container text-center my-5 pe-5'>
            <h1 style='color:white'>
                Bienvenue à notre coding 
                <span> <img src='IMAGES/Quiz.png' alt='logo'> </span>
                ...
            </h1>
        </div>

        <div class='container text-ceneter d-flex justify-content-center'>
            <h3 style='color:white'>
                Connectez-vous !
            </h3>
        </div>

        <div class='container text-center d-flex justify-content-center my-5'>
            <form action='traitements/user_login.php' method='get'>
                <input class='rounded-4' type='text' style='width: 20vw; height: 4vh' name='pseudo'  value='" . (isset($_GET['pseudo'])? $_GET['pseudo'] : '') . "' placeholder='{$placeholder}'>
                <br> <br>
                <button id='mainbutton' class='btn btn-success rounded-0' style='height: 45px; width: 120px' type='submit'>Soumettre</button>
            </form>
        </div>

        <div class='container text-center d-flex justify-content-center pe-5'>
            <p style='color:white'>Pas encore inscrit ? &nbsp;&nbsp;&nbsp;</p>
            <a style='color:white' href='signUp.php'> <h4> Créez votre profil ici </h4> </a>
        </div>
    ";
}

// Accueil si user enregistré
else {
    echo '
        <div class="container text-center my-5 d-flex justify-content-center">
            <h3 style="color:white" class="my-3">Choisissez votre thème en dessous</h3>
        </div>

        <section id="questions" class="container text-center my-5 "> ';
            if (!isset($_GET['theme'])){
                // Affichage des choix de questionnaire
                echo"
                    <section id='questionsChoice' class='container text-center'>";
                        include_once ('./traitements/choicesEcho.php');
                echo"</section>
                <br><br>";
                // Affichage liste des users
                echo "
                    <div id='userslist' class='container text-center d-flex justify-content-center text-white py-5 border border-light col-lg-6 col-md-6 col-sm-6'>
                    <section id='registeredUsers'>
                        <table>
                            <thead>
                                <tr>
                                    <th><h4>Users enregistrés</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                ";
                include_once('./traitements/config.php');
                $query = $db -> query("SELECT pseudo, id FROM users ORDER BY pseudo ASC");
                $users = $query->fetchAll();
                foreach ($users as $user) {
                    $query = $db->prepare(" SELECT *, DATE_FORMAT(scores.date,'%d/%m/%Y') AS niceDate
                                            FROM scores
                                            JOIN users ON users.id = scores.user_id
                                            WHERE scores.user_id = :user_id
                                            ORDER BY score DESC
                                            LIMIT 1
                                        ");
                    $query -> execute(['user_id' => $user['id']]);
                    if ($maxScore = $query->fetch()){
                        echo"   <tr>
                                    <td>
                                        <u>{$maxScore['pseudo']}</u> : 
                                            <i>&nbsp;&nbsp;max score - {$maxScore['score']} points 
                                            en {$maxScore['questions_theme']} 
                                            le {$maxScore['niceDate']}</i>
                                    </td>
                                </tr>";
                    }
                }
                
                echo"   </tbody>
                    </table> 
                </section>
                </div>
                ";
            } else {
                $_SESSION['theme'] = $_GET['theme'];
                $_SESSION['count'] = 0;
                $_SESSION['questions'] = [];
                $_SESSION['score'] = 0;
                echo "
                    <div class='container text-center my-5'>

                        <h4 style='color:white'>
                            Vous avez choisi le Quiz {$_SESSION['theme']}
                        </h4>

                        <div class='container text-center d-flex justify-content-center my-5'>
                            <div class='row'>

                                <div class='col'>
                                    <form action='../quizpage.php'>
                                        <button class='btn btn-success rounded-0 me-4' style='height: 45px; width: 120px' type='submit' value='Confirmer'>Confirmer</button>
                                    </form>
                                </div>

                                <div class='col'>
                                    <form action='../traitements/choicesEcho.php' method='get'>
                                        <input type='hidden' name='theme' value='destroy'>
                                        <button class='btn btn-danger rounded-0 ms-4' style='height: 45px; width: 120px' type='submit' value='Annuler'>Annuler</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                ";
            }
        echo' </section>';
}
?>

<?php
include_once('PHP/script.php');
?>

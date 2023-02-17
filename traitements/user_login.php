<?php
session_start();
include_once "config.php";

// vérification si pseudo existant

$req = $db->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
$req->execute   ([
                'pseudo' => strtolower($_GET['pseudo'])
                ]);

if($req->fetchColumn() > 0)
{
//  Pseudo connu, on initialise les variables $_SESSION utiles
   
    $dataBaseUsers = $db -> prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $dataBaseUsers -> execute   ([
                                "pseudo" => $_GET['pseudo'],
                                ]);
    $resultUsers = $dataBaseUsers -> fetch();

    $_SESSION['pseudo'] = $_GET['pseudo'];
    $_SESSION['user_id'] = $resultUsers['id'];
    $_SESSION['avatar'] = $resultUsers['avatar'];

    $dataBaseScore = $db -> prepare("SELECT * FROM scores WHERE user_id = :user_id ORDER BY score LIMIT 1");
    $dataBaseScore -> execute([
        "user_id" => $_SESSION['user_id']
    ]);
    $resultScores = $dataBaseScore -> fetch();

    if(!empty($resultScores)) {
        $_SESSION['max_score'] = $resultScores['score'];
    }

    header('Location: ../index.php');
}
else
{

// Pseudo inconnu on redirige vers la page de connection   


    header('Location: ../index.php?unknow=ok');
}

?>
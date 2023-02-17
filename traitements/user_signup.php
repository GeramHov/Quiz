<?php
session_start();
require_once('config.php');

// vérification si pseudo existant
$req = $db->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
$req->execute   ([
                'pseudo' => strtolower($_GET['pseudo'])
                ]);

if($req->fetchColumn() > 0)
{
// 'Pseudo déjà utilisé !' on renvoie vers le formulaire d'inscrition en spécifiant le pseudo déjà pris
    header('Location: ../login.php?pseudo=' . $_GET['pseudo']);
}
else
{
    // 'Pseudo libre :-)';
    // enregistrment de l'utilisateur en DB
    $request = $db->prepare("INSERT INTO users (pseudo, avatar) VALUES (:pseudo, :avatar)");
    $request->execute   ([ 
                        'pseudo' => $_GET['pseudo'],
                        'avatar' => $_GET['avatar']
                        ]);

    // récupération de ses infos (dont celles AUTOINCREMENT)
    $dataBaseUsers = $db -> prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $dataBaseUsers -> execute   ([
                                "pseudo" => $_GET['pseudo'],
                                ]);
    $resultUsers = $dataBaseUsers -> fetch();

    // initialisation des variables $_SESSION utiles
    $_SESSION['pseudo'] = $_GET['pseudo'];
    $_SESSION['user_id'] = $resultUsers['id'];
    $_SESSION['avatar'] = $resultUsers['avatar'];

    header('Location: ../index.php');
}

include_once('PHP/header.php');
include_once('PHP/script.php');
?>
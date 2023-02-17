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
//   echo 'Pseudo déjà utilisé !';
    header('Location: ../login.php?pseudo=' . $_GET['pseudo']);
}
else
{
//   echo 'Pseudo libre :-)';
    $request = $db->prepare("INSERT INTO users (pseudo, avatar) VALUES (:pseudo, :avatar)");
    $request->execute   ([ 
                        'pseudo' => $_GET['pseudo'],
                        'avatar' => $_GET['avatar']
                        ]);


    $dataBaseUsers = $db -> prepare("SELECT * FROM users WHERE pseudo = :pseudo");
    $dataBaseUsers -> execute   ([
                                "pseudo" => $_GET['pseudo'],
                                ]);
    $resultUsers = $dataBaseUsers -> fetch();

    $_SESSION['pseudo'] = $_GET['pseudo'];
    $_SESSION['user_id'] = $resultUsers['id'];
    $_SESSION['avatar'] = $resultUsers['avatar'];

    header('Location: ../index.php');
}

include_once('PHP/header.php');
include_once('PHP/script.php');
?>
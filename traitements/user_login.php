<?php
session_start();
include_once "config.php";

$_SESSION['pseudo'] = $_GET['pseudo'];
$dataBaseUsers = $db -> prepare("SELECT * FROM users WHERE pseudo = :pseudo");
$dataBaseUsers -> execute([
    "pseudo" => $_SESSION['pseudo'],
]);
$resultUsers = $dataBaseUsers -> fetch();

$_SESSION['user_id'] = $resultUsers['id'];

$dataBaseScore = $db -> prepare("SELECT * FROM scores WHERE user_id = :user_id ORDER BY score LIMIT 1");
$dataBaseScore -> execute([
    "user_id" => $_SESSION['user_id']
]);
$resultScores = $dataBaseScore -> fetch();

if(!empty($resultScores)) {
    $_SESSION['max_score'] = $resultScores['score'];
}

header('Location: ../index.php')
?>
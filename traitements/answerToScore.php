<?php
session_start();


// Vérifie bouton 'suivant' non-clické

if ($_GET['answer'] != 'next'){
    // préparation DB pour comparer la réponse cliquée à la réponse correcte
    require_once('../traitements/config.php');
    $query = $db->prepare(" SELECT * FROM questions 
                            WHERE id = :id");
    $query -> execute(['id' => $_GET['id']]);
    $response = $query -> fetch();

    // si réponse juste => incrémentation du score en fonction du temps restant
    if ($response[$_GET['answer']] == $response['true_answer']){
        $_SESSION['score']+= 10-(time() - $_GET['time']);
    }

    // préparation des attributs de borders pour les réponses et envoie en GET
    $a1 = ($response['a1'] == $response['true_answer'])? "a1=success" : "a1=failed";
    $a2 = ($response['a2'] == $response['true_answer'])? "a2=success" : "a2=failed";
    $a3 = ($response['a3'] == $response['true_answer'])? "a3=success" : "a3=failed";
    $a4 = ($response['a4'] == $response['true_answer'])? "a4=success" : "a4=failed";

    header('Location: ../quizpage.php?nextDisplay=ok&timer=none&'.$a1.'&'.$a2.'&'.$a3.'&'.$a4);
    exit();
} else {
    // Si bouton 'suivant' clické on passe à la question suivante
    $_SESSION['count']++;
    header('Location: ../quizpage.php');
    exit();
}
<?php
session_start();
// Requete permettant de selectionner 10 questions au hasard dans la DB selon le theme choisi par l'utilisateur
require_once('./traitements/config.php');

$query = $db->prepare(" SELECT * FROM questions 
                        WHERE theme = :theme
                        ORDER BY RAND()
                        LIMIT 10");
$query -> execute(['theme' => $_SESSION['theme']]);

$questions = $query->fetchAll();



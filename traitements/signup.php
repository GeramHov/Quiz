<?php
session_start();
// Vérification si pseudo déjà en DB ou non
require_once('config.php');

$pseudo = $_GET['pseudo'];

   $req = $db->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
   $req->execute([ 'pseudo' => strtolower($pseudo)
                    ]);

   if($req->fetchColumn() > 0)
   {
    // 'Pseudo déjà utilisé !' on renvoie vers le formulaire d'inscription
        header('Location: ../login.php?pseudo=' . $pseudo);
   }
   else
   {
    // 'Pseudo libre :-)' on enregistre l'user dans la DB puis renvoie vers l'index
        $request = $db->prepare("INSERT INTO users (pseudo) VALUES (:pseudo)");
        $request->execute([ 'pseudo' => $pseudo
                            ]);
        $_SESSION['pseudo'] = $pseudo;
        header('Location: ../index.php');
   }

   include_once('PHP/header.php');
   include_once('PHP/script.php');
?>



<?php
session_start();
// Vérification si pseudo déjà attribué ou pas
require_once('config.php');

$pseudo = $_GET['pseudo'];

   $req = $db->prepare("SELECT count(id) FROM users WHERE LOWER(pseudo) = :pseudo");
   $req->execute([ 'pseudo' => strtolower($pseudo)
                    ]);

   if($req->fetchColumn() > 0)
   {
    // 'Pseudo déjà utilisé !' on renvoie en arriere
        header('Location: ../index.php?login=existant');
   }
   else
   {
    // 'Pseudo libre :-)' l'utilisateur est créé et renvoie vers l'index
        $request = $db->prepare("INSERT INTO users (pseudo) VALUES (:pseudo)");
        $request->execute([ 'pseudo' => $pseudo
                            ]);
        $_SESSION['pseudo'] = $pseudo;
        header('Location: ../index.php');
   }
?>
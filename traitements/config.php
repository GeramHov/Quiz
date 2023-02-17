<?php
$dns = 'mysql:host=127.0.0.1;dbname=quiz';
$user = 'root';
$password = '';

try{
    $db = new PDO( $dns, $user, $password);
    // connection établie

}
catch (Exception $message){
    // connexion échouée
    echo "ya un blem <br>" . "<pre>$message</pre>" ;
}
?>
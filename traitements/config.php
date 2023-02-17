<?php
// Connection à la base de donée
$dns = 'mysql:host=127.0.0.1;dbname=quiz';
$user = 'root';
$password = '';

try{
    $db = new PDO( $dns, $user, $password);
    // echo "connection établie" ;

}
catch (Exception $message){
    echo "ya un blem <br>" . "<pre>$message</pre>" ;
}

    $conn = mysqli_connect("127.0.0.1", "root", "", "quiz");
    if(!$conn) {
        echo "Database is not connected :(";
    }
?>
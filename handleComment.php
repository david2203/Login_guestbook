<?php 

session_start();
$dsn = "mysql:host=localhost;dbname=guestbook";
$user="root";
$password = "";

$pdo = new PDO($dsn, $user, $password);



$username = $_SESSION['sess_user_name'];
$comment = $_POST['comment'];

$sql = "INSERT INTO entries(username, comment) VALUES(:username_IN, :comment_IN)";
$stm = $pdo->prepare($sql);
$stm->bindParam(':username_IN',$username);
$stm->bindParam(':comment_IN',$comment);

if($stm->execute()) {
    header("location:loggedin.php");
}
else {
    echo "Det gick fel!";
}

?>
<?php
$dsn = "mysql:host=localhost;dbname=guestbook";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

$idEdit = $_GET['id'];
$newComment = $_GET['newComment'];

$stm = $pdo->query("UPDATE entries SET comment = '$newComment' WHERE id=$idEdit");

if($stm->execute()) {
    header("location:loggedin.php");
}
else {
    echo "Det gick fel!";
}
?>
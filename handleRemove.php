<?php
$dsn = "mysql:host=localhost;dbname=guestbook";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

$idRemove = $_GET['id'];
$stm = $pdo->query("DELETE FROM entries WHERE id=$idRemove");

if($stm->execute()) {
    header("location:loggedin.php");
}
else {
    echo "Det gick fel!";
}
?>
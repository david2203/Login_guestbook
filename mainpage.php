<pre>
<?php
$dsn = "mysql:host=localhost;dbname=guestbook";
$user = "root";
$password = "";
$pdo = new PDO($dsn, $user, $password);

echo "<h2> Guestbook entries! </h2>";

$stm = $pdo->query("SELECT id, username, comment FROM entries");


while ($row = $stm->fetch()) {
    echo $row['id'] . " " . $row['username'] . " " . $row['comment'] . "<br />";
}
?>

Do you want to be a member ? <a href ="registration.php">Register here!</a>
Are you already a member? <a href="login.php">Login here!</a>
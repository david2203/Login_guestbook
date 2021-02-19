<?php 
session_start();

if(isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_id'] != "") {
  echo '<h1>Welcome '.$_SESSION['sess_name'].'</h1>';
  echo '<h4><a href="logout.php">Logout</a></h4>';
} else { 
  echo "Vänligen logga in igen <a href='login.php'>login</a>";
  die();
}

?>
<br>
<br>
<form method="POST" action="handleComment.php">
Comment: <br>
<textarea type="text" name="comment" > </textarea> <br />
<input type="submit" value="Submit comment!" />
</form>

<form action="handleRemove.php" method="GET">
    Chose comment id to remove the message! <br/>
    <input type="number" name="id"> <br/>
    <input type="submit" value="Remove entry">
</form>

<form action="handleEdit.php" method="GET">
    Chose comment id to update the message! <br/>
    <input type="number" name="id"> <br/>
    New message:<input type="text" name="newComment">
    <input type="submit" value="Edit entry">
</form>

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
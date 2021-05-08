<?php
include ‘connection.php’;
if (isset($_POST[‘add_title’])) {
$title = $_POST[‘title’];

$add_title = $mysqli->query(“INSERT INTO boards (board_name) VALUES (‘$title’)”);
if ($add_title) {
header(“Location: index.php”);
} else {
echo $mysqli->error;
}
}
?>

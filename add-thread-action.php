<?php
include ‘connection.php’;
if (isset($_POST[‘post_thread’])) {
$board_id = $_GET[‘board_id’];
$title = $_POST[‘title’];
$content = $_POST[‘content’];

$post_thread = $mysqli->query(“INSERT INTO threads (board_id, thread_title, thread_content) VALUES ($board_id, ‘$title’, ‘$content’)”);
if ($post_thread) {
header(“Location: view-board.php?board_id=$board_id”);
} else {
echo $mysqli->error;
}
}
?>

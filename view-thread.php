<?php
include ‘connection.php’;
$board_id = $_GET[‘board_id’];
$thread_id = $_GET[‘thread_id’];

$get_board = $mysqli->query(“SELECT * FROM boards WHERE board_id = $board_id”);
$board_data = $get_board->fetch_assoc();

$get_thread = $mysqli->query(“SELECT * FROM threads WHERE thread_id = $thread_id”);
$thread_data = $get_thread->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF-8″>
<title><?php echo $thread_data[‘thread_title’] ?></title>
</head>
<body>
<a href=”index.php”>Home</a> | <a href=”view-board.php?board_id=<?php echo $board_id ?>”><?php echo $board_data[‘board_name’] ?></a> | <b><?php echo $thread_data[‘thread_title’] ?></b><br><br>
Title: <b><?php echo $thread_data[‘thread_title’] ?></b><br><br>
<b>Content:</b><br>
<?php echo $thread_data[‘thread_content’] ?>
</body>
</html>

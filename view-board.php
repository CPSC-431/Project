<?php
include ‘connection.php’;
$board_id = $_GET[‘board_id’];
$get_board = $mysqli->query(“SELECT * FROM boards WHERE board_id = $board_id”);
$board_data = $get_board->fetch_assoc();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF-8″>
<title><?php echo $board_data[‘board_name’] ?></title>
</head>
<body>
<a href=”index.php”>Home</a> | <b><?php echo $board_data[‘board_name’]; ?></b><br><br>
<a href=”add-thread.php?board_id=<?php echo $board_id ?>”>Post New Thread</a><br><br>
<?php
$threads = $mysqli->query(“SELECT * FROM threads WHERE board_id = $board_id”);
while ($thread_data = $threads->fetch_assoc()) { ?>
<b>#<?php echo $thread_data[‘thread_id’] ?></b> <a href=”view-thread.php?thread_id=<?php echo $thread_data[‘thread_id’] ?>&board_id=<?php echo $board_id ?>”><?php echo $thread_data[‘thread_title’] ?></a>
<?php }
if ($threads->num_rows == null) {
echo ‘<br><br>no threads posted yet’;
}
?>
</body>
</html>

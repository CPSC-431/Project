<?php include ‘connection.php’ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF-8″>
<title>ITSOURCECODE Simple Forum</title>
</head>
<body>
<h3>ITSOURCECODE Simple Forum in PHP/MYSQL</h3>
<a href=”add-board.php”>Add New Topic Board</a><br>
<?php
$boards = $mysqli->query(“SELECT * FROM boards”);
while ($board_data = $boards->fetch_assoc()) {
$threads = $mysqli->query(“SELECT * FROM threads WHERE board_id = “.$board_data[‘board_id’].””);
?>
<br>
<b>#<?php echo $board_data[‘board_id’] ?></b> <a href=”view-board.php?board_id=<?php echo $board_data[‘board_id’] ?>”><?php echo $board_data[‘board_name’] ?></a> [<b><?php echo $threads->num_rows ?></b> Topics]
<?php }
if ($boards->num_rows == null) {
echo ‘<br>no topic board created yet’;
}
?>
</body>
</html>

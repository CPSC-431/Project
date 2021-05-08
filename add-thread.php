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
<title>Add New Thread</title>
</head>
<body>
<a href=”index.php”>Home</a> | <?php echo $board_data[‘board_name’] ?> | <b>Add Thread</b><br><br>
<form method=”post” action=”add-thread-action.php?board_id=<?php echo $board_id ?>”>
<label>Title:</label><br>
<input type=”text” name=”title” /><br>
<label>Content:</label><br>
< t e x t a r e a name=”content” >< / t e x t a r e a ><br><br>
<input type=”submit” name=”post_thread” value=”Post” />
</form>
</body>
</html>

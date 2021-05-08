<?php include ‘connection.php’; 
?>

<!DOCTYPE html>
<html>
<head>
<meta charset=”UTF-8″>
<title>Add New Topic Board</title>
</head>
<body>
<a href=”index.php”>Home</a> | Add New Topic Board<br><br>
<form method=”post” action=”add-board-action.php”>
<label>Board title:</label><br>
<input type=”text” name=”title” /><br><br>
<input type=”submit” name=”add_title” value=”Add” />
</form>
</body>
</html>

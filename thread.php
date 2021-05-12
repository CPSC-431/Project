<!doctype html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        #ques{
            min-height: 433px;
        }
    </style>
    <title>Welcome to Bootleg Reddit</title>
</head>

<body>
    <?php include 'parts/header.php'; ?>
    <?php include 'dbconnect.php'; ?>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];  
    if ($method == POST) {
	//insert comments into database
	$comment = $_POST['comment'];
    	$sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '0', '0000-00-00');"; 
    	$result = mysqli_query($conn, $sql);
	$showAlert = true;
	if (showAlert) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong>Ayyy it worked!</strong> Your comment has been added SUCCessfully.
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  			</button>
		</div>';
            }
    }
    ?>


    <!-- Category container starts here -->
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?></h1>
            <p class="lead"> <?php echo $desc;?></p>
            <hr class="my-4">
            <p>I know this is common sense, but please be kind to one another.</p>
            <p class=>Posted by: Sagar</p>
            <a class="btn btn-success btn-dark" href="index.php" role="button">Choose Another Category</a>
        </div>
    </div>


   <div class="container">
   <form action = "<?php echo $_SERVER['REQUEST_URI'] ?>" method = "post">
	<h1>Post your comment</h1>
  	<div class="form-group">
    		<label for="desc">Comment:</label>
    		<textarea class="form-control" id="comment" name="comment" rows="3" placeholder="join the convo..."></textarea>
  	</div>  	
	<button type="submit" class="btn btn-dark">Post Comment</button>
   </form>

    </div>


    <div class="container">
        <h1 class="py-2">Discussion</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
        $result = mysqli_query($conn, $sql);
        $noResults = true;
        while($row = mysqli_fetch_assoc($result)){
	$noResults = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];

            echo '<div class="media my-3">
                <img src="https://techpowerusa.com/wp-content/uploads/2017/06/default-user.png" width="50px" class="mr-3" alt="default-image">
                <div class="media-body">
                    <p class="font-weight-bold my-0">Anonymous User</p>
                    '. $content . '
                </div>
            </div>';

    }

    if ($noResults) {
	echo '<div class="jumbotron jumbotron-fluid">
   		<div class="container">
    			<p class="display-4">No Questions Found</p>
    			<p class="lead">Be the first person to include a question in this forum.</p>
  		</div>
	     </div>';
    }

    ?>

    </div>

  
    <?php include 'parts/footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>

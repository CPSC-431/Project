<!DOCTYPE html>
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
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id"; 
    $result = mysqli_query($conn, $sql);
 
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];  
    if ($method == POST) {
	//insert thread into database
	$th_title = $_POST['title'];
	$th_desc = $_POST['desc'];
    	$sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_user_id`, `thread_cat_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '0', '$id', '0000-00-00')"; 
    	$result = mysqli_query($conn, $sql);
	$showAlert = true;
	if (showAlert) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  			<strong>Ayyy it worked!</strong> Your thread has been added.
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
            <h1 class="display-4">Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"> <?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>I know this is common sense, but please be kind to one another.</p>
            <a class="btn btn-success btn-dark" href="index.php" role="button">Choose Another Category</a>
        </div>
    </div>

   <div class="container">
   <form action = "<?php echo $_SERVER['REQUEST_URI'] ?>" method = "post">
	<h1>Start a Discussion</h1>
  	<div class="form-group">
    		<label for="title">Problem Title</label>
    		<input type="text" class="form-control" id="title" name="title" aria-describedby="title">
    		<small id="title" class="form-text text-muted">Please keep it appropriate as possible</small>
  	</div>
  	<div class="form-group">
    		<label for="desc">Include your message here...</label>
    		<textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
  	</div>  	
	<button type="submit" class="btn btn-dark">Submit</button>
   </form>

    </div>
    <div class="container">
        <h1 class="py-2">Browse Topics</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id"; 
        $result = mysqli_query($conn, $sql);
        $noResults = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResults = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];

            echo '<div class="media my-3">
                <img src="https://techpowerusa.com/wp-content/uploads/2017/06/default-user.png" width="50px" class="mr-3" alt="default-image">
                <div class="media-body">
                    <h5 class="mt-0"> <a href="thread.php?threadid='. $id . '">'. $title . '</a></h5>
                    '. $desc . '
                </div>
            </div>';

    }

    // echo var_dump($noResults);  <!-- Ignore, was just used for testing purposes -->

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

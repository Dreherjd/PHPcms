<?php
include_once('includes/connection.php');
include_once('includes/review.php');

$review = new Review;

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$data = $review->fetch_data($id);

	?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>PHP web lab</title>
			<link rel="stylesheet" type="text/css" href="assets/style.css">
		</head>
		<body>
		<div class="container">
			<a href="index.php" id="logo">Vacation Spots</a>

			<h4><?php echo $data['review_title']; ?></h4>
			<p><?php echo $data['review_content']; ?></p>
			<a href="index.php">&larr; back</a>

		</div>



		</body>
		</html>


	<?php

}else{
	header('Location: index.php');
	exit();
}


?>
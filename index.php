<?php
include_once('includes/connection.php');
include_once('includes/review.php');

$review = new Review;
$reviews = $review->fetch_all();

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

	<ol>
		<?php foreach ($reviews as $review) { ?>
			<li><a href="review.php?id=<?php echo $review['review_id'];?>">
				<?php echo $review['review_title']; ?>
				</a>
			</li>
		<?php } ?>
	</ol>

	<br />

	<small><a href="admin">Admin</a></small>
</div>



</body>
</html>
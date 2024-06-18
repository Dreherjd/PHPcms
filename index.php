<?php
include_once('common/connection.php');
include_once('controllers/review.php');

$review = new Review;
$reviews = $review->getAllReviews();
?>
<?php include 'includes/header.php' ?>
<style>
	<?php include 'assets/style.css';?>
</style>

	<ol>
		<?php foreach ($reviews as $review): ?>
			<a href="review.php?id=<?php echo $review['review_id'];?>">
			<div class="callout primary">
				<h5><?php echo $review['review_title']; ?></h5>
				<p><?php echo $review['review_content']; ?></p>
			</div>
		</a>
		<?php endforeach; ?>
	</ol>

	<br />

	
<?php include 'includes/footer.php' ?>
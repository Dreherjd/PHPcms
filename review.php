<?php
include_once('common/connection.php');
include_once('controllers/review.php');

$review = new Review;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$data = $review->getReviewById($id);
}

?>
	<?php include 'includes/header.php'; ?>
	<style>
		<?php include 'assets/style.css'; ?>
	</style>

	<h4><?php echo $data['review_title']; ?></h4>
	<p><?php echo $data['review_content']; ?></p>
	<a class="button primary" href="index.php">Back</a>

<?php include 'includes/footer.php'; ?>



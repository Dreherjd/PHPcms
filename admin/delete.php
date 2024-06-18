<?php

session_start();

include('../common/connection.php');
include('../controllers/review.php');

$review = new Review;

if (isset($_SESSION['logged_in'])){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $pdo->prepare('DELETE FROM reviews WHERE review_id = ?');
        $query->bindValue(1, $id);
        $query->execute();

        header('location: delete.php');
    }

    $reviews = $review->getAllReviews();

?>
<?php include '../includes/header.php'; ?>
<style>
    <?php include '../assets/style.css'; ?>
</style>

	<br /><br />
    <h4>Select and article to delete:</h4>
    <form action="delete.php" method="get">
        <select onchange="this.form.submit();" name="id">
            <?php foreach ($reviews as $review) { ?>
                <option value="<?php echo $review['review_id'];?>"><?php echo $review['review_title']; ?></option>
            <?php } ?>
        </select>
    </form>

</div>
<?php include '../includes/footer.php'; ?>
<?php
}else{
	header('locationL index.php');
}

?>
<?php

session_start();

include_once('../includes/connection.php');
include_once('../includes/review.php');

$review = new Review;

if (isset($_SESSION['logged_in'])){

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $pdo->prepare('DELETE FROM reviews WHERE review_id = ?');
        $query->bindValue(1, $id);
        $query->execute();

        header('location: delete.php');
    }

    $reviews = $review->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP web lab</title>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>
<body>
<div class="container">
	<a href="index.php" id="logo">Vacation Spots</a>

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



</body>
</html>
<?php
}else{
	header('locationL index.php');
}

?>
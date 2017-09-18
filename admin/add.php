<?php
session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])){
	if(isset($_POST['title'], $_POST['content'])){
		$title = $_POST['title'];
		$content = nl2br($_POST['content']);

		if(empty($title) or empty($content)){
			$error = 'All fields are required!';
		}else{
			$query = $pdo->prepare('INSERT INTO reviews (review_title, review_content) VALUES (?, ?)');

			$query->bindValue(1, $title);
			$query->bindvalue(2, $content);

			$query->execute();

			header('location: index.php');
		}
	}
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

	<br />
		<h4>Add a Review</h4>

		<?php if(isset($error)){ ?>
		<small style="color:#aa0000;"><?php echo $error;?></small>
		<br /><br />
	<?php	} ?>


		<form action="add.php" method="post" autocomplete="off">
			<input type="text" name="title" placeholder="title" /><br /><br />
			<textarea rows="15" cols="50" placeholder="Content" name="content"></textarea><br /><br />
			<input type="submit" value="Add Article">
		</form>

</div>



</body>
</html>



	<?php
}else{
	header('location: index.php');
}



?>
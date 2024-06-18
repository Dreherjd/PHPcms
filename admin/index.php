<?php

session_start();

include_once('../common/connection.php');

if(isset($_SESSION['logged_in'])){

?>

<?php include '../includes/header.php' ?>
<style>
	<?php include '../assets/style.css'; ?>
</style>

	<br />
		<ol>
			<li><a href="add.php">Add A Review</a></li>
			<li><a href="delete.php">Delete A Review</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ol>

<?php include '../includes/footer.php' ?>




<?php

}else{
	if(isset($_POST['username'], $_POST['password'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if(empty($username) or empty($password)){
			$error = 'All Fields are Required!';
		}else{
			$query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
			$query->bindValue(1, $username);
			$query->bindValue(2, $password);

			$query->execute();

			$num = $query->rowCount();

			if($num == 1){
				//correct
				$_SESSION['logged_in'] = true;
				header('location: index.php');
				exit();
			}else{
				//false
				$error = 'Incorrect username or password';
			}
		}
	}
	?>

<?php include '../includes/header.php' ?>
<style>
	<?php include '../assets/style.css'; ?>
</style>

	<br /><br />

	<?php if(isset($error)){ ?>
		<small style="color:#aa0000;"><?php echo $error;?></small>
		<br /><br />
	<?php	} ?>

	<form action="index.php" method="post" autocomplete="off">
		<input type="text" name="username" placeholder="Username" />
		<input type="password" name="password" placeholder="Password" />
		<a class="button primary" href="index.php">Back</a>
		<input type="submit" class="button primary" value="Login" />
	</form>
	<br />

<?php include '../includes/footer.php' ?>

	<?php


}





?>
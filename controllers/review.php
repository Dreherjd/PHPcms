<?php include 'common/connection.php'; ?>

<?php
	class Review{
		function getAllReviews(){
			global $pdo;
			$query = $pdo->prepare("SELECT * FROM reviews");
			$query->execute();
			$result = $query->fetchAll();

			return $result;
		}

		public function getReviewById($review_id){
			global $pdo;
			$query = $pdo->prepare("SELECT * FROM reviews WHERE review_id = ?");
			$query->bindValue(1, $review_id);
			$query->execute();
			$result = $query->fetch();

			return $result;
		}

		public function deleteReviewById($review_id){
			global $pdo;
			$query = $pdo->prepare("DELETE FROM reviews WHERE review_id = ?");
			$query->bindValue(1, $review_id);
			$query->execute();
			header('location: index.php');
		}
	}


?>
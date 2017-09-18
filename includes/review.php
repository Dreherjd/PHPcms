<?php

	class Review{
		public function fetch_all(){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM reviews");
			$query->execute();

			return $query->fetchAll();
		}

		public function fetch_data($review_id){
			global $pdo;

			$query = $pdo->prepare("SELECT * FROM reviews WHERE review_id = ?");
			$query->bindValue(1, $review_id);
			$query->execute();

			return $query->fetch();
		}
	}


?>
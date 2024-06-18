<?php

try{
$pdo = new PDO('mysql:host=localhost;dbname=PhpCms', 'root', '');
} catch (PDOException $e){
	exit('Database Error.');
}



?>
<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$article = $_POST['article'];
			$quantite = $_POST['quantite'];
			$nature = $_POST['nature'];
			$date = $_POST['date'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `stock`SET `article` = '$article', `quantite` = '$quantite', `nature` = '$nature',`date` = '$date' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>
<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		try{
			$article = $_POST['article'];
			$quantite = $_POST['quantite'];
			$nature = $_POST['nature'];
			$date = $_POST['date'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `stock` (`article`, `quantite`, `nature`,`date`) VALUES ('$article', '$quantite', '$nature', '$date')";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Gestion de stocks | CB</title>
		<link rel="icon" type="image/x-icon" href="cb.png">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="login.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="log">
			<h1>Connexion</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Nom d'utilisateur" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Mot de passe" id="password" required>				
<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'stocks';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Echec de connection MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('veuillez remplir les champs');
}
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $password);
		$stmt->fetch();
		
		if (password_verify($_POST['password'], $password)) {
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['name'] = $_POST['username'];
			$_SESSION['id'] = $id;
            header('Location: index.php');
        		} else {
			echo '<font color="red"><b><p align="center"> Le nom ou le mot de passe incorrect!</font></p></b>';
		}
	} else {
		echo '<font color="red"><b><p align="center"> Login ou mot de passe incorrect!</font></p></b>';
	}

	$stmt->close();
}
?>
				<input type="submit" value="Se connecter">
			</form>			
		</div> 
		<center><a href="index1.php"  ><b>Je veux juste consulter le stock</b></a></center>
	</body>

</html>

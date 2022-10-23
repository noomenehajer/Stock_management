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
				<input type="submit" value="Se connecter">
			</form>			
		</div> 
		<center><a href="index1.php"  ><b>Je veux juste consulter le stock</b></a></center>
	</body>

</html>


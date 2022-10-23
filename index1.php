

<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Gestion de stocks | CB</title>
    <link rel="icon" type="image/x-icon" href="cb.png">
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		 <div style="display: block;">
		        <img style="float:left;width: 80px; height: auto;margin-left:2px;margin-top:15px;" src="cb.png" > 
		        <h1 style="float: left; margin-left:10px;margin-bottom:20px;color: #337ab7;" >Gestion de stocks</h1>
                <h5 style="float:right;margin-top:35px;margin-right:55px;color:#337ab7;" > <b>Se connecter</b></h5>
				<a style="position: absolute;margin-right:50px; margin-top:35px ;right: 0;float: right; " href="login.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
			    </a>
		  </div>
		</div>
<b>	</nav>
<div>
	<nav style="
	margin-top:-20px;
    padding:10px;
    text-align: center;
    display: grid; 
    grid-template-columns: 1fr 2fr 2fr 2fr ;
    border-bottom:orange solid 1px;
    border-top:orange solid 1px;
	font-size:large;">
	    <a href="index1.php"> <img style="width:40px;margin-top: 1px;margin-left: -20px;"src="home.jpg" > </a>
        <a style="margin-top: 10px;" href="index1.php"><b>Journal des entrées et des sorties</b></a>
		<a style="margin-top: 10px; " href="etat1.php"><b>Etat de stocks</b></a>
		<a style="margin-top: 10px; " href="liste1.php">Liste des articles</a>
			   
    </nav></div>
	<div style="width=100%; margin-left:200px; ">
		<h3 style="margin-left: 140px;color: green; margin-top:40px;" ><b>Journal des entrées et des sorties des articles</b></h3>
         <br>
		
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Article</th>
						<th>Quantité</th>
						<th>Nature</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT * FROM `stock`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['article']?></td>
						<td><?php echo $fetch['quantite']?></td>
						<td><?php echo $fetch['nature']?></td>
						<td><?php echo $fetch['date']?></td>
						
						
					</tr>
					
					
					
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
					</b>
					
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	

</body>


</html>
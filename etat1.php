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

		 <img style="float:left;width: 80px; height: auto;margin-left:2px;margin-top:15px;" src="cb.png" > 
		        <h1 style="float: left; margin-left:10px;margin-bottom:20px; color: #337ab7;" >Gestion de stocks</h1>
                <h5 style="float:right;margin-top:35px;margin-right:55px;color:#337ab7;" > <b>Se connecter</b></h5>
				<a href="login.php"style="position: absolute;margin-right:50px; margin-top:35px ;right: 0;float: right; " >
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
			    </a>
		 
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
    
	<div style="width=100%; margin-left:200px" >
		<h3 style="margin-left:350px;color: green; margin-top:40px;" ><b>Etat de stocks</b></h3>
        <br>	
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="alert-info">
				<tr>
						<th>Article</th>
						<th>Stock initial</th>
						<th>Entrées / Sorties</th>
						<th>Stock final</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
						require 'conn.php';
						$sql = $conn->prepare("SELECT `article` ,-`retrai`as `depo`,sum(`qte`)as `final`,(sum(`qte`)+`retrai`) as `retrai` FROM `vue1`  group by `article`");
						$sql->execute();
						while($fetch = $sql->fetch()){
					?>
					<tr>
						<td><?php echo $fetch['article']?></td>	
						<td><?php echo $fetch['retrai']?></td>
						<td><?php echo $fetch['depo']?></td>																
						<td><?php echo $fetch['final']?></td>
					</tr>
					
					
					
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
					</b>
          <div style="position: absolute; bottom: 0; right: 0; text-align:right; margin-right:30px; " >
		  <b>Copyright © 2022</b>, <b>Gestion de stocks</b> :<b> Hajer Noomene </b>
          </div>
		
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>
</html>
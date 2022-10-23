<?php 
session_start();
if ($_SESSION['loggedin'] != true) {
	header('Location: login.php');
	exit;
}?>

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
				 <h5 style="float:right;margin-top:35px;margin-right:55px;color:#337ab7;" > <b>Déconnexion</b></h5>
				<a href="logout.php"style="position: absolute;margin-right:50px; margin-top:35px ;right: 0;float: right; " href="logout.php">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg></i></a>
		  </div>
		</div><b>
	</nav>
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
	    <a href="index.php"> <img style="width:40px;margin-top: 1px;margin-left: -20px;"src="home.jpg" > </a>
        <a style="margin-top: 10px;" href="index.php"><b>Journal des entrées et des sorties</b></a>
		<a style="margin-top: 10px; " href="etat.php"><b>Etat de stocks</b></a>
		<a style="margin-top: 10px; " href="liste.php">Liste des articles</a>
			   
    </nav></div>
	
	<div style="width=100% ">
		<h3 style="margin-left: 359px;color: green; margin-top:40px;" ><b>Journal des entrées et des sorties des articles</b></h3>
         <br>
		<div class="col-md-3">
		  <div style="border:orange; border-width:1px; border-style:solid;">
			  <form method="POST" action="add.php" style="margin-left:10px;margin-right:10px">
                 <br>
		    	<div class="form-group">
					<label>Article</label>
					<input required class="form-control" type="text" name="article"/>
				</div>
				<div class="form-group">
					<label>Quantité</label>
					<input required class="form-control" type="number" name="quantite"/>
				</div>
				<div class="form-group">
					<label>Nature</label> 
					<input required class="form-control" type="text" name="nature"/>
				</div>
				<div class="form-group">
					<label>Date</label> 
					<input required class="form-control" type="text" name="date"/>
				</div>
				<div class="form-group">
					<button class="btn btn-primary form-control" type="submit" name="save">Ajouter</button>
				</div>
			  </form>
          </div>
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Article</th>
						<th>Quantité</th>
						<th>Nature</th>
						<th>Date</th>
						<th>Action</th>
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
						<td>
					    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $fetch['id']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></button> 
						<a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $fetch['id']?>" onclick="return confirm('Etes-vous sûr que vous voulez supprimer cet article?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6.5 1a.5.5 0 0 0-.5.5v1h4v-1a.5.5 0 0 0-.5-.5h-3ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1H3.042l.846 10.58a1 1 0 0 0 .997.92h6.23a1 1 0 0 0 .997-.92l.846-10.58Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg></a>
					    </td>
						
					</tr>
					
					<div class="modal fade" id="update<?php echo $fetch['id']?>" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<form method="POST" action="update.php">
									<div class="modal-header">
										<h3 class="modal-title">Modifier un article</h3>
									</div>	
									<div class="modal-body">
										<div class="col-md-2"></div>
										<div class="col-md-8">
											<div class="form-group">
												<label>Article</label>
												<input required class="form-control" type="text" value="<?php echo $fetch['article']?>" name="article"/>
												<input type="hidden" value="<?php echo $fetch['id']?>" name="id"/>
											</div>
											<div class="form-group">
												<label>Quantité</label>
												<input required class="form-control" type="number" value="<?php echo $fetch['quantite']?>" name="quantite"/>
											</div>
											<div class="form-group">
												<label>Nature</label> 
												<input required class="form-control" type="text" value="<?php echo $fetch['nature']?>" name="nature"/>
											</div>
											<div class="form-group">
												<label>Date</label> 
												<input required class="form-control" type="text" value="<?php echo $fetch['date']?>" name="date"/>
											</div>
											<div class="form-group">
												<button class="btn btn-warning form-control" type="submit" name="update">Modifier</button>
											</div>
											
										</div>	
									</div>	
									<br style="clear:both;"/>
									<div class="modal-footer">
										<button class="btn btn-danger" data-dismiss="modal">Fermer</button>
									</div>
								</form>
							</div>
						</div>
					</div>	
					
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

<footer style=" text-align:right; margin-right:30px; ">        
		  <b>Copyright © 2022</b>, <b>Gestion de stocks</b> :<b> Hajer Noomene </b>    
</footer>
</html>
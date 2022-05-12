<?php 
include "config.php";



?>
<!DOCTYPE html>
<html>
<head>
	<meta lang="fr">
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/813af80c02.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="CSS/accueil.css">
	<title>Liste fpec</title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">
					<a href="accueil.php" class="dashboard-nav-item "><i class="fas fa-tachometer-alt"></i> Dashboard
					</a><a
					href="inscription.php" class="dashboard-nav-item"><i class="fas fa-file-upload"></i> Inscriptions </a>

					<div class='dashboard-nav-dropdown active'>
						<a class="dashboard-nav-item dashboard-nav-dropdown-toggle">
							<i class="fas fa-photo-video"></i> FPEC </a>

							<div class='dashboard-nav-dropdown-menu '>
								<a href="fpec_all_dash.php" class="dashboard-nav-dropdown-item">Tous</a>
								<a href="fpec_a1_dash.php" class="dashboard-nav-dropdown-item">Réception</a>
								<a href="fpec_b1_dash.php" class="dashboard-nav-dropdown-item">Diagnostique</a>
								<a href="fpec_b2_dash.php" class="dashboard-nav-dropdown-item">Devis proposé</a>
								<a class="dashboard-nav-dropdown-item active">Intervention</a>
								<a href="fpec_c2_dash.php" class="dashboard-nav-dropdown-item">Terminé</a>
								<a href="fpec_d1_dash.php" class="dashboard-nav-dropdown-item">Livraison</a>
							</div>
						</div>

						<div class='dashboard-nav-dropdown'>
							<a class="dashboard-nav-item dashboard-nav-dropdown-toggle"><i class="fas fa-users"></i>Client</a>
							<div class='dashboard-nav-dropdown-menu'>
								<a href="client_all.php" class="dashboard-nav-dropdown-item">Tous</a>
								<a href="client_abonnée.php" class="dashboard-nav-dropdown-item">Abonné(e)</a>
								<a href="client_noabonnée.php" class="dashboard-nav-dropdown-item">Non abonné(e)</a>
							</div>
						</div>
						<div class="nav-item-divider"></div>
						<a href="deconnexion.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Déconnexion </a>
					</nav>
				</div>
				<div class='dashboard-app'>
					<header class='dashboard-toolbar'><a class="menu-toggle"><i class="fas fa-bars"></i></a></header>
					<div class='dashboard-content'>
						<div class='container'>
							<div class='card'>
								<div class='card-header'>
									<h1>Liste intervention des fiches fpec </h1>
								</div>
								<div class='card-body'>
									<?php
									$sql = 'SELECT DISTINCT * FROM fiche_peg WHERE status = "C1 Intervention"';
									?>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Status</th>
													<th scope="col">Date</th>
													<th scope="col">Heure</th>
													<th scope="col">Type</th>
													<th scope="col">Marque</th>
													<th scope="col">Action</th>
													<th scope="col">Supprimer</th>
												</tr>
											</thead>
											<tbody>

												<tr>
													<?php
													foreach ($bdd->query($sql) as $row) {

														echo '
														<td>'.$row['status'].'</td>
														<td>'.$row['datee'].'</td>
														<td>'.$row['heure'].'</td>
														<td>'.$row['type'].'</td>
														<td>'.$row['marque'].'</td>'?>
														<td><a href="modifinterv.php?id=<?php echo $row['id_inter'] ?>">Modifier</a></td>
														<td><a href="supprimer2.php?id_interv=<?php echo $row['id_inter'] ?>">Supprimer</a></td>
													</tr>
													<?php 

												}   
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
			<script src="JS/accueil.js"></script>
			</html>
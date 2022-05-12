<?php 
include "config.php";

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM fiche_peg WHERE id_inter = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();



}


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
	<title>Fiche pec de <?php echo $user['nom'];?></title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">

					<a href="modifinterv.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa fa-file" aria-hidden="true"></i> Fiche fpec
					</a>

					
					<a href="download.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-download"></i> Télécharger </a>


					<a href="devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-calculator "></i> Devis </a>

					<a class="dashboard-nav-item active"><i class="fa-solid fa-plus"></i> Acceptation devis </a>

					<a href="supprimer.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-trash"></i> Supprimer </a>

					<hr style="color:white;">

					<a href="profil.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-user"></i> Profil
					</a>

					<div class='dashboard-nav-dropdown'>
						<a class="dashboard-nav-item dashboard-nav-dropdown-toggle "><i class="fa-solid fa-desktop"></i>Matériel</a>
						<div class='dashboard-nav-dropdown-menu'>
							<a href="materiel_all.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">TOUS</a>
							<a href="pcfixe.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">PC FIXE</a>
							<a href="pcportable.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">PC PORTABLE</a>
							<a href="tablette.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">TABLETTE</a>
							<a href="telephone.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">TÉLEPHONE</a>
						</div>
					</div>

					<div class="nav-item-divider"></div>
					<a href="deconnexion.php" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Déconnexion </a>
				</nav>
			</div>
			<div class='dashboard-app'>
				<form method="post">
					<header class='dashboard-toolbar'><a class="menu-toggle"><i class="fas fa-bars"></i></a></header>
					<div class='dashboard-content'>
						<div class='container'>
							<div class='card'>
								<div class='card-header'>
									<h3>Acceptation du devis :</h3>
									<p><?php echo $user['nom']. " ". $user['prenom']?></p>
									<p><?php echo $user['telephone'];?></p>
								</div>

								<div class='card-body'>						
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Matériel :</h3>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<div class="row">
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Matériel </label>
																<input type="text" disabled name="nom" value="<?php echo $user['type'] ?>" class="form-control form-control-lg" />
															</div>
														</div>
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Marque </label>
																<input type="text" disabled name="prenom" value="<?php echo $user['marque'] ?>" class="form-control form-control-lg" />
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Symptôme </label>
																<input type="text" disabled maxlength="10" value="<?php echo $user['symptome'] ?>" name="tel" class="form-control form-control-lg"/>
															</div>
														</div>
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Récuperation des données si possible </label>
																<input type="text" disabled value="<?php echo $user['recup'] ?>" name="newrecup" class="form-control form-control-lg"/>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class='card-body'>
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary mb-5">Devis proposition accepter :</h3>
									<?php
									$sql = "SELECT * FROM intervention LIMIT 5 ";
									?>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Opération valider</th>
													<th scope="col">Prix</th>
												</tr>
											</thead>
											<tbody>
												<tr>

													<td><label><?php if (!empty($user['proposition'])) {
														echo $user['proposition'];} ?></label></td>
														<td><label><?php if (!empty($user['prix'])) {
															echo $user['prix'];} ?></label></td>
															
														</tr>
														<tr>

															<td><label><?php if (!empty($user['proposition2'])) {
																echo $user['proposition2'];} ?></label></td>
																<td><label><?php if (!empty($user['prix2'])) {
																	echo $user['prix2'];} ?></label></td>

																</tr>
																<tr>

																	<td><label><?php if (!empty($user['proposition3'])) {
																		echo $user['proposition3'];} ?></label></td>
																		<td><label><?php if (!empty($user['prix3'])) {
																			echo $user['prix3'];} ?></label></td>

																		</tr>
																		<tr>

																			<td><label><?php if (!empty($user['proposition4'])) {
																				echo $user['proposition4'];} ?></label></td>
																				<td><label><?php if (!empty($user['prix4'])) {
																					echo $user['prix4'];} ?></label></td>
																					
																				</tr>
																				<tr>

																					<td><label><?php if (!empty($user['proposition5'])) {
																						echo $user['proposition5'];} ?></label></td>
																						<td><label><?php if (!empty($user['prix5'])) {
																							echo $user['prix5'];} ?></label></td>
																							
																						</tr>

																					</tbody>
																				</table>
																			</div>

																			<div class="mx-auto text-center py-5">
																				<p class="btn btn-primary"  type="text">Devis accepter</p>
																			</div>

																			<div class="mx-auto text-center py-5" style="color:red;">
																				<?php if(!empty($erreur)){
																					echo $erreur;
																				};
																				?>
																			</div>



																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</body>
										<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
										<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
										<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
										<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
										<script src="JS/accueil.js"></script>
										</html>
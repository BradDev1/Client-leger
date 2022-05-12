<?php 
include "config.php";

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM clients WHERE id_client = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

}

if(isset($_POST['enregistrement'])) {
	$client = htmlspecialchars($user['id_client']);
	$nom = htmlspecialchars($user['nom']);
	$prenom =  htmlspecialchars($user['prenom']);	
	$tel =  htmlspecialchars($user['telephone']);
	$type =  htmlspecialchars($_POST['type']);
	$marque =  htmlspecialchars($_POST['materiel']);
	$mdp =  htmlspecialchars($_POST['mdp']);
	$symptome =  htmlspecialchars($_POST['symptome']);
	$recup =  htmlspecialchars($_POST['recup']);
	$contrat =  htmlspecialchars($_POST['status']);                           


//Création de condition pour envoyer la requête qui vas envoyer les informations pour intervention

	if(!empty($_GET['id'])){
		if (!empty($_POST['status'])) {
			if(!empty($_POST['recup'])) {
				if(!empty($user['status'])){
					if(!empty($user['nom']) and !empty($user['prenom']) AND !empty($user['telephone'])){
						if(!empty($_POST['type'])){
							if(!empty($_POST['materiel'])){
								if(!empty($_POST['mdp'])){
									if(!empty($_POST['symptome'])){

										$insertmbr = $bdd->prepare("INSERT INTO fiche_peg (id_client,status,recup,contrat,nom,prenom,telephone,datee,heure,type,marque,mdp,symptome) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ");

										$insertmbr->execute(array($user['id_client'], $_POST['status'], $_POST['recup'], $user['status'], $user['nom'], $user['prenom'], $user['telephone'], $_POST['date'], $_POST['heure'], $_POST['type'], $_POST['materiel'], $_POST['mdp'], $_POST['symptome']));

										header("Location: profil.php?id=".$_GET['id']);

									}else{
										$erreur =  "probleme symptome";
									}

								}else{
									$erreur =  "probleme mdp";
								}

							}else{
								$erreur =  "probleme materiel";
							}

						}else{
							$erreur =  "probleme type";
						}

					}else{
						$erreur =  "probleme nom prenom tel";
					}

				}else{
					$erreur =  "probleme contrat";
				}

			}else{
				$erreur =  "probleme recup";
			}
			
		}else{
			$erreur =  "probleme status";
		}


	}else{
		$erreur =  "probleme id";
	}
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
	<title>Profil <?php echo $user['nom'];?></title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">
					<a href="profil.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-user"></i> Profil
					</a>
					<a class="dashboard-nav-item active"><i class="fa-solid fa-plus"></i> Fiche PEC </a>

					<a href="espace_materiel.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-plus"></i> Matériel </a>

					<div class='dashboard-nav-dropdown'>
						<a class="dashboard-nav-item dashboard-nav-dropdown-toggle">
							<i class="fas fa-photo-video"></i> FPEC </a>

							<div class='dashboard-nav-dropdown-menu'>
								<a href="fpec_all.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Tous</a>
								<a href="fpec_a1.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Réception</a>
								<a href="fpec_b1.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Diagnostique</a>
								<a href="fpec_b2.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Devis proposé</a>
								<a href="fpec_c1.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Intervention</a>
								<a href="fpec_c2.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Terminé</a>
								<a href="fpec_d1.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-dropdown-item">Livraison</a>
							</div>
						</div>

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

						<a href="modifprof.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Paramètre compte </a>

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
									<h3>Client <?php echo $user['nom']. " ". $user['prenom'];?></h3>
									<p><?php echo $user['status'] ?></p>
								</div>
								<div class='card-body'>
									<h4 class="mx-auto text-center">Enregistrement de fiche pec :</h4>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<form method="post">
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Symptôme <label style="color:red">*</label></label>
																	<input type="text" autocomplete="off" name="symptome" class="form-control form-control-lg" />
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Mot de passe <label style="color:red">*</label></label>
																	<input type="text" autocomplete="off" name="mdp" class="form-control form-control-lg" />
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<select class="form-select" name="type">
																		<option disabled selected value>--Choisir le matériel--</option>
																		<?php
																		$reqtype = $bdd->prepare("SELECT DISTINCT type FROM ordinateur WHERE id_client = '".$_GET['id']."'");
																		$reqtype->execute();

																		$reqtype1 = $reqtype->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['type']) && $_POST['type'] == $reqtype1[$k]['type'] && $reqtype1[$k]['type'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['type'] . '"'.$selected1.'>' . $reqtype1[$k]['type'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<select class="form-select" name="materiel">
																		<option disabled selected value>--Choisir le matériel--</option>
																		<?php
																		$reqtype = $bdd->prepare("SELECT DISTINCT marque FROM ordinateur WHERE id_client = '".$_GET['id']."'");
																		$reqtype->execute();

																		$reqtype1 = $reqtype->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['marque']) && $_POST['marque'] == $reqtype1[$k]['marque'] && $reqtype1[$k]['marque'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['marque'] . '"'.$selected1.'>' . $reqtype1[$k]['marque'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Récupération des données si possible <label style="color:red">*</label></label>
																	<select class="form-select respo" name="recup">
																		<option disabled selected value>--Choisir une réponse--</option>
																		<option value="oui">Oui</option>
																		<option value="non">Non</option>
																		
																	</select>
																</div>
															</div>
														</div>

														<div class="mx-auto text-center">
															<input class="btn btn-primary btn-lg" name="enregistrement" type="submit" value="Enregistrement" />
														</div>

														<div class="mx-auto text-center py-5" style="color:red;">
															<?php if(!empty($erreur)){
																echo $erreur;
															};
															?>
														</div>

														<?php
														date_default_timezone_set('Europe/Paris');
														?>
														<input type="hidden" type="date" name="date" value="<?php echo date("d-m-Y"); ?>">
														<input  type="hidden" type="heure" name="heure" value="<?php echo date('H:i:s'); ?>">

														<input type="hidden" name="status" value="A1 Réception">



													</form>
												</div>
											</div>
										</div>
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
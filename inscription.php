<?php
include "config.php";

try{
	if(isset($_POST['inscription'])) {
		$nom = strtoupper(($_POST['nom']));                             
		$prenom = ucfirst($_POST['prenom']);
		$tel = htmlspecialchars($_POST['tel']);
		$newtel = wordwrap($tel,2, ' ', true);
		$fix = htmlspecialchars($_POST['tel_fix']);
		$newfix = wordwrap($fix,2, ' ', true);
		$adresse = htmlspecialchars($_POST['adresse']);
		$codepostal = strtoupper($_POST['cp']);
		$ville = ucfirst($_POST['ville']);
		$email = htmlspecialchars($_POST['mail']);


		if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['tel']) OR !empty($_POST['tel_fix']) OR !empty($_POST['adresse']) OR !empty($_POST['cp']) OR !empty($_POST['ville']) OR !empty($_POST['mail'])) {

			$reqtel = $bdd->prepare("SELECT * FROM clients WHERE telephone = ?");
			$reqtel->execute(array($tel));
			$telexist = $reqtel->rowCount();
			if($telexist == 0){
				$insertmbr = $bdd->prepare("INSERT INTO clients (nom, prenom, telephone,telephone_fix, adresse, codepostal, ville, email) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
				$insertmbr->execute(array($nom, $prenom, $newtel, $newfix, $adresse, $codepostal, $ville, $email));

				$requser1 = $bdd->prepare("SELECT * FROM clients WHERE nom = ? AND prenom = ?");
				$requser1->execute(array($nom,$prenom));
				$userexit = $requser1->rowCount();
				$userinfo = $requser1->fetch();
				$_SESSION['id_client'] = $userinfo['id_client'];
				$_SESSION['nom'] = $userinfo['nom'];
				$_SESSION['prenom'] = $userinfo['prenom'];
				header("Location: profil.php?id=".$_SESSION['id_client']);
			}else{
				$erreur = "Numéro de téléphone deja utilisé";
			}
		}else{
			$erreur = "Tous les champs doivent être complétés !";
		}
	}
}catch(PDOException $message){
	"Erreur : ". $message->getMessage();
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
	<title>Inscription</title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">
					<a href="accueil.php" class="dashboard-nav-item "><i class="fas fa-tachometer-alt"></i> Dashboard
					</a><a
					href="inscription.php" class="dashboard-nav-item active"><i class="fas fa-file-upload"></i> Inscriptions </a>

					<div class='dashboard-nav-dropdown'>
						<a class="dashboard-nav-item dashboard-nav-dropdown-toggle">
							<i class="fas fa-photo-video"></i> FPEC </a>

							<div class='dashboard-nav-dropdown-menu'>
								<a href="fpec_all_dash.php" class="dashboard-nav-dropdown-item">Tous</a>
								<a href="fpec_a1_dash.php" class="dashboard-nav-dropdown-item">Réception</a>
								<a href="fpec_b1_dash.php" class="dashboard-nav-dropdown-item">Diagnostique</a>
								<a href="fpec_c2_dash.php" class="dashboard-nav-dropdown-item">Devis proposé</a>
								<a href="fpec_c1_dash.php" class="dashboard-nav-dropdown-item">Intervention</a>
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
									<h1>Inscription</h1>
								</div>
								<div class='card-body'>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<form method="post">
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Nom <label style="color:red">*</label></label>
																	<input type="text" name="nom" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Prénom <label style="color:red">*</label></label>
																	<input type="text" name="prenom" class="form-control form-control-lg" />
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Numéro de téléphone <label style="color:red">*</label></label>
																	<input type="text" maxlength="10" name="tel" class="form-control form-control-lg"/>
																</div>

															</div>
															<div class="col-md-6 mb-4">
																<label class="form-label">Numéro de téléphone fixe</label>
																<input type="text" maxlength="10" name="tel_fix" class="form-control form-control-lg"/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Adresse Mail</label>
																	<input type="email" name="mail" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">

																<div class="form-outline">
																	<label class="form-label">Adresse Postal</label>
																	<input type="text" name="adresse" class="form-control form-control-lg" />
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Code Postal</label>
																	<input type="text" name="cp" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">

																<div class="form-outline">
																	<label class="form-label">Ville</label>
																	<input type="text" name="ville" class="form-control form-control-lg" />
																</div>
															</div>
														</div>
													</div>

													<div class="mx-auto text-center">
														<input class="btn btn-primary btn-lg" name="inscription" type="submit" value="Inscription" />
													</div>
													<div class="mx-auto text-center py-5" style="color:red;">
														<?php if(!empty($erreur)){
															echo $erreur;
														};
														?>
													</div>

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
<?php 
include "config.php";

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM fiche_peg WHERE id_inter = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

}

if(isset($_POST['fpec'])) {

	if(isset($_GET['id'])) {
		$getid = intval($_GET['id']);
		$requser = $bdd->prepare("SELECT disque_dur FROM ordinateur");
		$requser->execute(array($_GET['id']));
		$ordi = $requser->fetch();


		if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND $_POST['newmdp'] != $user['mdp']) {
			$newmdp = htmlspecialchars($_POST['newmdp']);
			$insertmdp = $bdd->prepare("UPDATE fiche_peg SET mdp = ? WHERE id_inter = ?");
			$insertmdp->execute(array($newmdp, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}


		if(isset($_POST['stockage']) AND !empty($_POST['stockage']) AND $_POST['stockage'] != $interv['stockage']) {
			$stockage = htmlspecialchars($_POST['stockage']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET stockage = ? WHERE id_inter = ?");
			$insertstockage->execute(array($stockage, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du type de stockage";
		}

		if(isset($_POST['taille']) AND !empty($_POST['taille']) AND $_POST['taille'] != $interv['taille']) {
			$taille = htmlspecialchars($_POST['taille']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET taille = ? WHERE id_inter = ?");
			$insertstockage->execute(array($taille, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la taille de stockage";
		}

		if(isset($_POST['stockage2']) AND !empty($_POST['stockage2']) AND $_POST['stockage2'] != $interv['stockage2']) {
			$stockage2 = htmlspecialchars($_POST['stockage2']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET stockage2 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($stockage2, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du type de stockage 2";
		}

		if(isset($_POST['taille2']) AND !empty($_POST['taille2']) AND $_POST['taille2'] != $interv['taille2']) {
			$taille2 = htmlspecialchars($_POST['taille2']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET taille2 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($taille2, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la taille de stockage 2";
		}


		if(isset($_POST['problemes']) AND !empty($_POST['problemes']) AND $_POST['problemes'] != $interv['problemes']) {
			$problemes = htmlspecialchars($_POST['problemes']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET problemes = ? WHERE id_inter = ?");
			$insertstockage->execute(array($problemes, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification des problemes de stockage";
		}


		if(isset($_POST['newram']) AND !empty($_POST['newram']) AND $_POST['newram'] != $reqtype1[$k]['nbr_ram']) {
			$newram = htmlspecialchars($_POST['newram']);
			$insertram = $bdd->prepare("UPDATE fiche_peg SET nbr_ram = ? WHERE id_inter = ?");
			$insertram->execute(array($newram, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du nombre de barrette de ram";
		}

		if(isset($_POST['newgo']) AND !empty($_POST['newgo']) AND $_POST['newgo'] != $reqtype1[$k]['nbr_go']) {
			$newgo = htmlspecialchars($_POST['newgo']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET nbr_go = ? WHERE id_inter = ?");
			$insertgo->execute(array($newgo, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du nombre de Go";
		}

		if(isset($_POST['newdetail']) AND !empty($_POST['newdetail']) AND $_POST['newdetail'] != $interv['detail']) {
			$newdetail = htmlspecialchars($_POST['newdetail']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET materiel = ? WHERE id_inter = ?");
			$insertgo->execute(array($newdetail, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification des details";
		}

		if(isset($_POST['system']) AND !empty($_POST['system']) AND $_POST['system'] !=  $interv['system']) {
			$system = htmlspecialchars($_POST['system']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET system = ? WHERE id_inter = ?");
			$insertgo->execute(array($system, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du champs No Boot";
		}

		if(isset($_POST['system2']) AND !empty($_POST['system2']) AND $_POST['system2'] !=  $interv['system2']) {
			$system2 = htmlspecialchars($_POST['system2']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET system2 = ? WHERE id_inter = ?");
			$insertgo->execute(array($system2, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du champs Blue Screen";
		}

		if(isset($_POST['system3']) AND !empty($_POST['system3']) AND $_POST['system3'] !=  $interv['system3']) {
			$system3 = htmlspecialchars($_POST['system3']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET system3 = ? WHERE id_inter = ?");
			$insertgo->execute(array($system3, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du champs Erreurs";
		}

		if(isset($_POST['system4']) AND !empty($_POST['system4']) AND $_POST['system4'] !=  $interv['system4']) {
			$system4 = htmlspecialchars($_POST['system4']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET system4 = ? WHERE id_inter = ?");
			$insertgo->execute(array($system4, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du champs infections";
		}

		if(isset($_POST['system5']) AND !empty($_POST['system5']) AND $_POST['system5'] !=  $interv['system5']) {
			$system5 = htmlspecialchars($_POST['system5']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET system5 = ? WHERE id_inter = ?");
			$insertgo->execute(array($system5, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du champs lenteur";
		}


		if(isset($_POST['newnotes']) AND !empty($_POST['newnotes']) AND $_POST['newnotes'] != $interv['newnotes']) {
			$newnotes = htmlspecialchars($_POST['newnotes']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET notes = ? WHERE id_inter = ?");
			$insertgo->execute(array($newnotes, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la note";
		}

		if(isset($_POST['licence']) AND !empty($_POST['licence']) AND $_POST['licence'] != $interv['licence']) {
			$licence = htmlspecialchars($_POST['licence']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET licence = ? WHERE id_inter = ?");
			$insertgo->execute(array($licence, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la licence";
		}

		if(isset($_POST['statuss']) AND !empty($_POST['statuss']) AND $_POST['statuss'] != $reqtype1[$k]['statuss']) {
			$statuss = htmlspecialchars($_POST['statuss']);
			$insertgo = $bdd->prepare("UPDATE fiche_peg SET status = ? WHERE id_inter = ?");
			$insertgo->execute(array($statuss, $_GET['id']));
			header("Location: profil.php?id=". $user['id_client']);

		}else{
			$erreur = "Une erreur est survenue pour la modification du status";
		}

		
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
	<title>Fiche pec de <?php echo $user['nom'];?></title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">
					<a class="dashboard-nav-item active"><i class="fa fa-file" aria-hidden="true"></i> Fiche fpec
					</a>

					<a href="download.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-download"></i> Télécharger </a>

					<a href="devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-calculator"></i> Devis </a>

					<a href="acceptation_devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-plus"></i> Acceptation devis </a>

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
										<h3>Fiche d'intervention :</h3>
										<p><?php echo $user['nom']. " ". $user['prenom']?></p>
										<p><?php echo $user['telephone'];?></p>
										<div class="form-outline">
											<select class="form-select w-25 mx-auto" name="statuss">
												<?php
												$reqtype = $bdd->prepare("SELECT DISTINCT status FROM intervention WHERE status IS NOT NULL");
												$reqtype->execute();
												if(!empty($user['problemes'])){?>
													<option disabled selected class="form-select w-25 mx-auto text-center" value><?php echo $user['status'] ?></option>
												<?php }

												$reqtype1 = $reqtype->fetchAll();
												foreach ($reqtype1 as $k => $v) {
													$selected1 = !empty($_POST['statuss']) && $_POST['statuss'] == $reqtype1[$k]['status'] && $reqtype1[$k]['status'] ? 'selected' : ''; 
													echo '<option class="mx-auto text-center" value="' . $reqtype1[$k]['status'] . '"'.$selected1.'>' . $reqtype1[$k]['status'] . '</option>';
												}
											?>
										</select>
									</div>
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
																<label class="form-label">Numéro de téléphone </label>
																<input type="text" disabled maxlength="10" value="<?php echo $user['telephone'] ?>" name="tel" class="form-control form-control-lg"/>
															</div>
														</div>
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Mot de passe </label>
																<input type="text" value="<?php echo $user['mdp'] ?>" name="newmdp" class="form-control form-control-lg"/>
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
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Stockage :</h3>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<div class="row">
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Type stockage</label>
																<select class="form-select" name="stockage">
																	<?php
																	$type = $user['type'];
																	$marque = $user['marque'];
																	$id = $user['id_client'];
																	$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																	$reqlog->execute(array($type, $marque, $id));

																	$reqtype1 = $reqlog->fetchAll();
																	foreach ($reqtype1 as $k => $v) {
																		$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['disque_dur'] && $reqtype1[$k]['disque_dur'] ? 'selected' : ''; 
																		echo '<option value="' . $reqtype1[$k]['disque_dur'] . '"'.$selected1.'>' . $reqtype1[$k]['disque_dur'] . '</option>';
																	}
																	?>
																</select>
															</div>
														</div>

														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Taille stockage</label>
																<select class="form-select" name="taille">
																	<?php
																	$type = $user['type'];
																	$marque = $user['marque'];
																	$id = $user['id_client'];
																	$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																	$reqlog->execute(array($type, $marque, $id));

																	$reqtype1 = $reqlog->fetchAll();
																	foreach ($reqtype1 as $k => $v) {
																		$selected1 = !empty($_POST['taille']) && $_POST['taille'] == $reqtype1[$k]['capacitedc'] && $reqtype1[$k]['capacitedc'] ? 'selected' : ''; 
																		echo '<option value="' . $reqtype1[$k]['capacitedc'] . '"'.$selected1.'>' . $reqtype1[$k]['capacitedc'] . '</option>';
																	}
																?></select>
															</div>
														</div>
													</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Type stockage 2</label>
																	<select class="form-select" name="stockage2">
																		<?php
																		$type = $user['type'];
																		$marque = $user['marque'];
																		$id = $user['id_client'];
																		$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																		$reqlog->execute(array($type, $marque, $id));

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage2']) && $_POST['stockage2'] == $reqtype1[$k]['disque_dur2'] && $reqtype1[$k]['disque_dur2'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['disque_dur2'] . '"'.$selected1.'>' . $reqtype1[$k]['disque_dur2'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Taille stockage 2</label>
																	<select class="form-select" name="taille2">
																		<?php
																		$type = $user['type'];
																		$marque = $user['marque'];
																		$id = $user['id_client'];
																		$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																		$reqlog->execute(array($type, $marque, $id));

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['taille2']) && $_POST['taille2'] == $reqtype1[$k]['capacitedc2'] && $reqtype1[$k]['capacitedc2'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['capacitedc2'] . '"'.$selected1.'>' . $reqtype1[$k]['capacitedc2'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>


													<div class="row">
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Nombre de barrette de ram</label>
																<select class="form-select" name="newram">
																	<?php
																	$type = $user['type'];
																	$marque = $user['marque'];
																	$id = $user['id_client'];
																	$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																	$reqlog->execute(array($type, $marque, $id));

																	$reqtype1 = $reqlog->fetchAll();
																	foreach ($reqtype1 as $k => $v) {
																		$selected1 = !empty($_POST['newram']) && $_POST['newram'] == $reqtype1[$k]['ram'] && $reqtype1[$k]['ram'] ? 'selected' : ''; 
																		echo '<option value="' . $reqtype1[$k]['ram'] . '"'.$selected1.'>' . $reqtype1[$k]['ram'] . '</option>';
																	}
																	?>
																</select>
															</div>
														</div>

														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Nombre de Go</label>
																<select class="form-select" name="newgo">
																	<?php
																	$type = $user['type'];
																	$marque = $user['marque'];
																	$id = $user['id_client'];
																	$reqlog = $bdd->prepare("SELECT * FROM ordinateur WHERE type = ? AND marque = ? AND id_client = ?");
																	$reqlog->execute(array($type, $marque, $id));

																	$reqtype1 = $reqlog->fetchAll();
																	foreach ($reqtype1 as $k => $v) {
																		$selected1 = !empty($_POST['newgo']) && $_POST['newgo'] == $reqtype1[$k]['go'] && $reqtype1[$k]['go'] ? 'selected' : ''; 
																		echo '<option value="' . $reqtype1[$k]['go'] . '"'.$selected1.'>' . $reqtype1[$k]['go'] . '</option>';
																	}
																	?>
																</select>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-6 mb-4">
															<div class="form-outline">
																<label class="form-label">Problème</label>
																<select class="form-select" name="problemes">
																	<?php if(empty($user['problemes'])){?>
																		<option disabled selected value>-- Choisir le problème --</option>
																	<?php }?>
																	<?php if(!empty($user['problemes'])){?>
																		<option disabled selected value><?php echo $user['problemes'] ?></option>
																	<?php }?>
																	<?php
																	$reqtype = $bdd->prepare("SELECT DISTINCT * FROM system");
																	$reqtype->execute();

																	$reqtype1 = $reqtype->fetchAll();
																	foreach ($reqtype1 as $k => $v) {
																		$selected1 = !empty($_POST['problemes']) && $_POST['problemes'] == $reqtype1[$k]['problemes'] && $reqtype1[$k]['problemes'] ? 'selected' : ''; 
																		echo '<option value="' . $reqtype1[$k]['problemes'] . '"'.$selected1.'>' . $reqtype1[$k]['problemes'] . '</option>';
																	}
																?></select>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class='card-body'>						
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Système :</h3>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<div class="row">
														<div class="col-md-6 mb-4 mx-auto text-center">
															<h5 class="mx-auto text-center mb-2">Problèmes systèmes :</h5>
															<div class="form-check">
																<input class="form-check-input" type="hidden" value="Aucun problème pour le no boot" name="system" id="boot">
																<input class="form-check-input" type="checkbox" value="No Boot" name="system" id="boot">
																<label class="form-check-label" for="flexCheckDefault">
																	No Boot
																</label>
															</div>

															<div class="form-check">
																<input class="form-check-input" type="hidden" value="Aucun blue screen" name="system2" id="blue">
																<input class="form-check-input" type="checkbox" value="Blue Screen" name="system2" id="blue">
																<label class="form-check-label" for="flexCheckDefault">
																	Blue Screen
																</label>	
															</div>

															<div class="form-check">
																<input class="form-check-input" type="hidden" value="Aucune erreur" name="system3" id="erreur">
																<input class="form-check-input" type="checkbox" value="Erreurs" name="system3" id="erreur">
																<label class="form-check-label" for="flexCheckDefault">
																	Erreurs
																</label>	
															</div>

															<div class="form-check">
																<input class="form-check-input" type="hidden" value="Aucune infection" name="system4" id="infection">
																<input class="form-check-input" type="checkbox" value="Infections"  name="system4" id="infections">
																<label class="form-check-label" for="flexCheckDefault">
																	Infections
																</label>	
															</div>

															<div class="form-check">
																<input class="form-check-input" type="hidden" value="Aucune lenteur" name="system5" id="lenteur">
																<input class="form-check-input" type="checkbox" value="Lenteur" name="system5" id="lenteur">
																<label class="form-check-label" for="flexCheckDefault">
																	Lenteur
																</label>	
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class='card-body'>						
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Détails Matériel :</h3>
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<div class="row">
														<div class="form-group">
															<label class="mb-2" for="exampleFormControlTextarea3">Détails matériel :</label>
															<textarea name="newdetail" style="resize : none;" class="form-control" placeholder="<?php if(!empty($user['materiel'])){
																echo $user['materiel'];
																}else{
																	echo 'Veuillez renseigner les détails supplémentaires pour le matériel.';
																}?>" rows="7"></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class='card-body'>						
										<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Licence Windows :</h3>
										<div class="container h-100">
											<div class="row justify-content-center align-items-center h-100">
												<div class="col-12 col-lg-9 col-xl-7">
													<div class="card-body p-4 p-md-5">
														<div class="row">
															<div class="form-group">
																<label class="mb-2" for="exampleFormControlTextarea3">Licence Windows :</label>
																<input name="licence" style="resize : none;" class="form-control" placeholder="<?php if(!empty($user['licence'])){
																	echo $user['licence'];
																	}else{
																		echo 'Veuillez renseigner la licence windows si disponible.';
																	}?>" id="exampleFormControlTextarea3" rows="7"></input>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class='card-body'>						
											<h3 style="color:white;" class="mx-auto text-center card-header bg-primary">Notes supplémentaire :</h3>
											<div class="container h-100">
												<div class="row justify-content-center align-items-center h-100">
													<div class="col-12 col-lg-9 col-xl-7">
														<div class="card-body p-4 p-md-5">
															<div class="row">
																<div class="form-group">
																	<label class="mb-2" for="exampleFormControlTextarea3">Notes supplémentaire :</label>
																	<textarea name="newnotes" style="resize : none;" class="form-control" placeholder="<?php if(!empty($user['notes'])){
																		echo $user['notes'];
																		}else{
																			echo 'Veuillez renseigner des notes supplémentaire.';
																		}?>" id="exampleFormControlTextarea3" rows="7"></textarea>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="mx-auto text-center">
												<input class="btn btn-primary btn-lg" name="fpec" type="submit" value="Valider" />
											</div>

											<div class="mx-auto text-center py-5" style="color:red;">
												<?php if(!empty($erreur)){
													echo $erreur;
												};
												?>
											</div>
										</div>
									</div>

								</div>
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
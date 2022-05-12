<?php 
include "config.php";

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM ordinateur WHERE id_ordinateur = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();
}



if(isset($_POST['mat'])) {

	if(isset($_POST['n_serie']) AND !empty($_POST['n_serie']) AND $_POST['n_serie'] != $user['n_serie']) {
		$n_serie = htmlspecialchars($_POST['n_serie']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET n_serie = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($n_serie, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification du numéro de série du ".$user['type'];
	}

	if(isset($_POST['model']) AND !empty($_POST['model']) AND $_POST['model'] != $user['model']) {
		$model = htmlspecialchars($_POST['model']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET model = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($model, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification du modèle du ".$user['type'];
	}

	if(isset($_POST['stockage']) AND !empty($_POST['stockage']) AND $_POST['stockage'] != $user['disque_dur']) {
		$stockage = htmlspecialchars($_POST['stockage']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET disque_dur = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($stockage, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le premier stockage ";
	}

	if(isset($_POST['taille']) AND !empty($_POST['taille']) AND $_POST['taille'] != $user['capacitedc']) {
		$taille = htmlspecialchars($_POST['taille']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET capacitedc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($taille, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la taille du premier stockage";
	}

	if(isset($_POST['formatdc']) AND !empty($_POST['formatdc']) AND $_POST['formatdc'] != $user['formatdc']) {
		$formatdc = htmlspecialchars($_POST['formatdc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET formatdc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($formatdc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le format du premier stockage";
	}

	if(isset($_POST['modeldc']) AND !empty($_POST['modeldc']) AND $_POST['modeldc'] != $user['modeldc']) {
		$modeldc = htmlspecialchars($_POST['modeldc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET modeldc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($modeldc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le modèle du premier stockage";
	}

	if(isset($_POST['marquedc']) AND !empty($_POST['marquedc']) AND $_POST['marquedc'] != $user['marquedc']) {
		$marquedc = htmlspecialchars($_POST['marquedc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET marquedc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($marquedc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la marque du premier stockage";
	}

	if(isset($_POST['n_seriedc']) AND !empty($_POST['n_seriedc']) AND $_POST['n_seriedc'] != $user['n_seriedc']) {
		$n_seriedc = htmlspecialchars($_POST['n_seriedc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET n_seriedc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($n_seriedc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le numéro de série du premier stockage";
	}

	if(isset($_POST['duredc']) AND !empty($_POST['duredc']) AND $_POST['duredc'] != $user['duredc']) {
		$duredc = htmlspecialchars($_POST['duredc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET duredc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($duredc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la durée de vie du premier stockage";
	}

	if(isset($_POST['stockage2']) AND !empty($_POST['stockage2']) AND $_POST['stockage2'] != $user['disque_dur2']) {
		$stockage2 = htmlspecialchars($_POST['stockage2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET disque_dur2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($stockage2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le deuxième stockage";
	}

	if(isset($_POST['taille2']) AND !empty($_POST['taille2']) AND $_POST['taille2'] != $user['capacitedc2']) {
		$taille2 = htmlspecialchars($_POST['taille2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET capacitedc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($taille2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la taille du deuxième stockage";
	}

	if(isset($_POST['formatdc2']) AND !empty($_POST['formatdc2']) AND $_POST['formatdc2'] != $user['formatdc2']) {
		$formatdc2 = htmlspecialchars($_POST['formatdc2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET formatdc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($formatdc2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le format du deuxième stockage";
	}

	if(isset($_POST['modeldc2']) AND !empty($_POST['modeldc2']) AND $_POST['modeldc2'] != $user['modeldc2']) {
		$modeldc2 = htmlspecialchars($_POST['modeldc2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET modeldc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($modeldc2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le modèle du deuxième stockage";
	}

	if(isset($_POST['marquedc2']) AND !empty($_POST['marquedc2']) AND $_POST['marquedc2'] != $user['marquedc2']) {
		$marquedc2 = htmlspecialchars($_POST['marquedc2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET marquedc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($marquedc2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la marque du deuxième stockage";
	}

	if(isset($_POST['n_seriedc2']) AND !empty($_POST['n_seriedc2']) AND $_POST['n_seriedc2'] != $user['n_seriedc2']) {
		$n_seriedc2 = htmlspecialchars($_POST['n_seriedc2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET n_seriedc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($n_seriedc2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le numéro de série du deuxième stockage";
	}

	if(isset($_POST['duredc2']) AND !empty($_POST['duredc2']) AND $_POST['duredc2'] != $user['duredc2']) {
		$duredc2 = htmlspecialchars($_POST['duredc2']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET duredc2 = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($duredc2, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la durée de vie du deuxième stockage";
	}

	if(isset($_POST['nbr_ram']) AND !empty($_POST['nbr_ram']) AND $_POST['nbr_ram'] != $user['ram']) {
		$nbr_ram = htmlspecialchars($_POST['nbr_ram']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET ram = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($nbr_ram, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le nombre de ram";
	}

	if(isset($_POST['nbr_go']) AND !empty($_POST['nbr_go']) AND $_POST['nbr_go'] != $user['go']) {
		$nbr_go = htmlspecialchars($_POST['nbr_go']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET go = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($nbr_go, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la taille de la ram";
	}

	if(isset($_POST['proc']) AND !empty($_POST['proc']) AND $_POST['proc'] != $user['proc']) {
		$proc = htmlspecialchars($_POST['proc']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET proc = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($proc, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec le processeur";
	}

	if(isset($_POST['cg']) AND !empty($_POST['cg']) AND $_POST['cg'] != $user['carte_graph']) {
		$cg = htmlspecialchars($_POST['cg']);
		$insertmdp = $bdd->prepare("UPDATE ordinateur SET carte_graph = ? WHERE id_ordinateur = ?");
		$insertmdp->execute(array($cg, $_GET['id']));
		header("Location: profil.php?id=". $user['id_client']);
	}else{
		$erreur = "Une erreur est survenue pour la modification avec la carte graphique";
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
	<title>Fiche matériel</title>
</head>
<body id="body-pd">
	<div class='dashboard'>
		<div class="dashboard-nav">
			<header>
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">

					<a class="dashboard-nav-item active"><i class="fa fa-file" aria-hidden="true"></i> Fiche matériel
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

						<hr style="color:white;">
						<a href="profil.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-user"></i> Profil
						</a>
						<a href="modifprof.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fas fa-cogs"></i> Paramètre compte </a>

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
										<h3>Matériel :</h3>
										<p class="mx-auto text-left">Type : <?php echo $user['type']. "<br> Marque : ". $user['marque']?></p>
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
																	<input type="text" disabled name="type" value="<?php echo $user['type'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Marque </label>
																	<input type="text" disabled name="marque" value="<?php echo $user['marque'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Numéro de serie </label>
																	<input type="text" value="<?php echo $user['n_serie'] ?>" name="n_serie" class="form-control form-control-lg"/>
																</div>
															</div>
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Modèle </label>
																	<input type="text" value="<?php echo $user['model'] ?>" name="model" class="form-control form-control-lg"/>
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
																		<option disabled selected value><?php echo $user['disque_dur'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM stockage WHERE type IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['type'] && $reqtype1[$k]['type'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['type'] . '"'.$selected1.'>' . $reqtype1[$k]['type'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Taille stockage</label>
																	<select class="form-select" name="taille">
																		<option disabled selected value><?php echo $user['capacitedc'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT * FROM stockage WHERE capacite IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['taille']) && $_POST['taille'] == $reqtype1[$k]['capacite'] && $reqtype1[$k]['capacite'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['capacite'] . '"'.$selected1.'>' . $reqtype1[$k]['capacite'] . '</option>';
																		}
																	?></select>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Format du stockage</label>
																	<select class="form-select" name="formatdc">
																		<option disabled selected value><?php echo $user['formatdc'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM stockage WHERE format IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['format'] && $reqtype1[$k]['format'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['format'] . '"'.$selected1.'>' . $reqtype1[$k]['format'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>


														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Modèle du stockage </label>
																	<input type="text" value="<?php echo $user['modeldc'] ?>" name="modeldc" class="form-control form-control-lg"/>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Marque du stockage </label>
																	<input type="text" value="<?php echo $user['marquedc'] ?>" name="marquedc" class="form-control form-control-lg"/>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Numéro de série </label>
																	<input type="text" value="<?php echo $user['n_seriedc'] ?>" name="n_seriedc" class="form-control form-control-lg"/>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Durée de vie du stockage en heure </label>
																	<input type="number" value="<?php echo $user['duredc'] ?>" name="duredc" class="form-control form-control-lg"/>
																</div>
															</div>
														</div>

														<hr>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Type stockage 2</label>
																	<select class="form-select" name="stockage2">
																		<option disabled selected value><?php echo $user['disque_dur2'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM stockage WHERE type IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['type'] && $reqtype1[$k]['type'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['type'] . '"'.$selected1.'>' . $reqtype1[$k]['type'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Taille stockage 2</label>
																	<select class="form-select" name="taille2">
																		<option disabled selected value><?php echo $user['capacitedc2'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT * FROM stockage WHERE capacite IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['taille']) && $_POST['taille'] == $reqtype1[$k]['capacite'] && $reqtype1[$k]['capacite'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['capacite'] . '"'.$selected1.'>' . $reqtype1[$k]['capacite'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Format du stockage</label>
																	<select class="form-select" name="formatdc2">
																		<option disabled selected value><?php echo $user['formatdc2'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM stockage WHERE format IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['format'] && $reqtype1[$k]['format'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['format'] . '"'.$selected1.'>' . $reqtype1[$k]['format'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Modèle du stockage 2 </label>
																	<input type="text" value="<?php echo $user['modeldc2'] ?>" name="modeldc2" class="form-control form-control-lg"/>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Marque du stockage 2 </label>
																	<input type="text" value="<?php echo $user['marquedc2'] ?>" name="marquedc2" class="form-control form-control-lg"/>
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Numéro de série 2 </label>
																	<input type="text" value="<?php echo $user['n_seriedc2'] ?>" name="n_seriedc2" class="form-control form-control-lg"/>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Durée de vie du stockage en heure 2 </label>
																	<input type="number" value="<?php echo $user['duredc2'] ?>" name="duredc2" class="form-control form-control-lg"/>
																</div>
															</div>
														</div>

														<hr>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Nombre de barrette de ram</label>
																	<select class="form-select" name="nbr_ram">
																		<option disabled selected value><?php echo $user['ram'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM ram WHERE nbr_ram IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['nbr_ram'] && $reqtype1[$k]['nbr_ram'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['nbr_ram'] . '"'.$selected1.'>' . $reqtype1[$k]['nbr_ram'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Nombre de Go</label>
																	<select class="form-select" name="nbr_go">
																		<option disabled selected value><?php echo $user['go'] ?></option>
																		<?php
																		$reqlog = $bdd->prepare("SELECT DISTINCT * FROM ram WHERE nbr_go IS NOT NULL");
																		$reqlog->execute();

																		$reqtype1 = $reqlog->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['stockage']) && $_POST['stockage'] == $reqtype1[$k]['nbr_go'] && $reqtype1[$k]['nbr_go'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['nbr_go'] . '"'.$selected1.'>' . $reqtype1[$k]['nbr_go'] . '</option>';
																		}
																		?>
																	</select>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
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
																	<label class="form-label">Processeur </label>
																	<input type="text" value="<?php echo $user['proc'] ?>" name="proc" class="form-control form-control-lg"/>
																</div>
															</div>

															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Carte Graphique </label>
																	<input type="text" value="<?php echo $user['carte_graph'] ?>" name="cg" class="form-control form-control-lg"/>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="mx-auto text-center">
										<input class="btn btn-primary btn-lg" name="mat" type="submit" value="Valider" />
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
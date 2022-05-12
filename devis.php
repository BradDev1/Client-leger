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


		if(isset($_POST['valid1']) AND !empty($_POST['valid1']) AND $_POST['valid1'] != $user['proposition']) {
			$valid1 = htmlspecialchars($_POST['valid1']);
			$insertmdp = $bdd->prepare("UPDATE fiche_peg SET proposition = ? WHERE id_inter = ?");
			$insertmdp->execute(array($valid1, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}


		if(isset($_POST['valid2']) AND !empty($_POST['valid2']) AND $_POST['valid2'] != $user['proposition2']) {
			$valid2 = htmlspecialchars($_POST['valid2']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET proposition2 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($valid2, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du type de stockage";
		}

		if(isset($_POST['valid3']) AND !empty($_POST['valid3']) AND $_POST['valid3'] != $user['proposition3']) {
			$valid3 = htmlspecialchars($_POST['valid3']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET proposition3 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($valid3, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la taille de stockage";
		}

		if(isset($_POST['valid4']) AND !empty($_POST['valid4']) AND $_POST['valid4'] != $user['proposition4']) {
			$valid4 = htmlspecialchars($_POST['valid4']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET proposition4 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($valid4, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du type de stockage 2";
		}

		if(isset($_POST['valid5']) AND !empty($_POST['valid5']) AND $_POST['valid5'] != $user['proposition5']) {
			$valid5 = htmlspecialchars($_POST['valid5']);
			$insertstockage = $bdd->prepare("UPDATE fiche_peg SET proposition5 = ? WHERE id_inter = ?");
			$insertstockage->execute(array($valid5, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification de la taille de stockage 2";
		}


		if(isset($_POST['prix1']) AND !empty($_POST['prix1'])) {
			$prix1 = htmlspecialchars($_POST['prix1']);
			$insertprix = $bdd->prepare("UPDATE fiche_peg SET prix = ? WHERE id_inter = ?");
			$insertprix->execute(array($prix1, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}

		if(isset($_POST['prix2']) AND !empty($_POST['prix2'])) {
			$prix2 = htmlspecialchars($_POST['prix2']);
			$insertprix = $bdd->prepare("UPDATE fiche_peg SET prix2 = ? WHERE id_inter = ?");
			$insertprix->execute(array($prix2, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}

		if(isset($_POST['prix3']) AND !empty($_POST['prix3'])) {
			$prix3 = htmlspecialchars($_POST['prix3']);
			$insertprix = $bdd->prepare("UPDATE fiche_peg SET prix3 = ? WHERE id_inter = ?");
			$insertprix->execute(array($prix3, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}

		if(isset($_POST['prix4']) AND !empty($_POST['prix4'])) {
			$prix4 = htmlspecialchars($_POST['prix4']);
			$insertprix = $bdd->prepare("UPDATE fiche_peg SET prix4 = ? WHERE id_inter = ?");
			$insertprix->execute(array($prix4, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
		}

		if(isset($_POST['prix5']) AND !empty($_POST['prix5'])) {
			$prix5 = htmlspecialchars($_POST['prix5']);
			$insertprix = $bdd->prepare("UPDATE fiche_peg SET prix5 = ? WHERE id_inter = ?");
			$insertprix->execute(array($prix5, $_GET['id']));
			header("Location: modifinterv.php?id=". $user['id_inter']);
		}else{
			$erreur = "Une erreur est survenue pour la modification du mot de passe";
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

					<a href="modifinterv.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa fa-file" aria-hidden="true"></i> Fiche fpec
					</a>

					
					<a href="download.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-download"></i> Télécharger </a>


					<a class="dashboard-nav-item active"><i class="fa-solid fa-calculator "></i> Devis </a>

					<a href="acceptation_devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item "><i class="fa-solid fa-plus"></i> Acceptation devis </a>

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
									<h3>Devis pour :</h3>
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
									<h3 style="color:white;" class="mx-auto text-center card-header bg-primary mb-5">Devis proposition :</h3>
									<?php
									$sql = "SELECT * FROM intervention LIMIT 5 ";
									?>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Validation</th>
													<th scope="col">Opération</th>
													<th scope="col">Validation</th>
													<th scope="col">Tarif</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<input type="hidden" name="valid1" value="Aucun frais de pec">
													<input type="hidden" name="prix1" value=" ">
													<td><input id="prix1" type="checkbox" name="valid1" value="Frais de pec"></td>
													<td><label>Frais de Pec</label></td>
													<td><input id="prix1" type="checkbox" name="prix1" value="29"></td>
													<td><label>29€</label></td>
												</tr>
												<tr>
													<input type="hidden" name="valid2" value="Aucune révision compléte">
													<input type="hidden" name="prix2" value=" ">
													<td><input id="prix2" type="checkbox" name="valid2" value="Révision compléte"></td>
													<td><label>Révision compléte</label></td>
													<td><input id="prix1" type="checkbox" name="prix2" value="109"></td>
													<td><label>109€</label></td>
												</tr>
												<tr>
													<input type="hidden" name="valid3" value="Aucune révision partielle">
													<input type="hidden" name="prix3" value=" ">
													<td><input id="prix3" type="checkbox" name="valid3" value="Révision partielle"></td>
													<td><label>Révision partielle</label></td>
													<td><input id="prix1" type="checkbox" name="prix3" value="79"></td>
													<td><label>79€</label></td>
												</tr>
												<tr>
													<input type="hidden" name="valid4" value="Aucune récuperation de données">
													<input type="hidden" name="prix4" value=" ">
													<td><input id="prix4" type="checkbox" name="valid4" value="Récuperation de données"></td>
													<td><label>Récuperation de données</label></td>
													<td><input id="prix1" type="checkbox" name="prix4" value="60"></td>
													<td><label>60€</label></td>
												</tr>
												<tr>
													<input type="hidden" name="valid5" value="Aucun nettoyage physique">
													<input type="hidden" name="prix5" value=" ">
													<td><input id="prix5" type="checkbox" name="valid5" value="Nettoyage physique"></td>
													<td><label>Nettoyage Physique</label></td>
													<td><input id="prix1" type="checkbox" name="prix5" value="60"></td>
													<td><label>60€</label></td>
												</tr>
												
											</tbody>
										</table>
									</div>

									<div class="mx-auto text-center py-5">
										<input class="btn btn-primary btn-lg" name="fpec" type="submit" value="Enregistrement" />
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
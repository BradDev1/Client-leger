<?php
include "config.php";

if(isset($_GET['id'])) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM clients WHERE id_client = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

//Modification du profil (Téléphone)
	if(isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] != $user['telephone']) {
		$tel = htmlspecialchars($_POST['newtel']);
		$newtel = wordwrap($tel,2, ' ', true);
		$inserttel = $bdd->prepare("UPDATE clients SET telephone = ? WHERE id_client = ?");
		$inserttel->execute(array($newtel, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}

	//Modification du profil (Téléphone)
	if(isset($_POST['newfix']) AND !empty($_POST['newfix']) AND $_POST['newfix'] != $user['tel_fix']) {
		$fix = htmlspecialchars($_POST['newfix']);
		$newfix = wordwrap($fix,2, ' ', true);
		$inserttel = $bdd->prepare("UPDATE clients SET telephone_fix = ? WHERE id_client = ?");
		$inserttel->execute(array($newfix, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}

//Modification du profil (Adresse)
	if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
		$newadresse = htmlspecialchars($_POST['newadresse']);
		$insertadresse = $bdd->prepare("UPDATE clients SET adresse = ? WHERE id_client = ?");
		$insertadresse->execute(array($newadresse, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}

//Modification du profil (Code Postal)
	if(isset($_POST['newcodepostal']) AND !empty($_POST['newcodepostal']) AND $_POST['newcodepostal'] != $user['codepostal']) {
		$newcodepostal = htmlspecialchars($_POST['newcodepostal']);
		$insertcodepostal= $bdd->prepare("UPDATE clients SET codepostal = ? WHERE id_client = ?");
		$insertcodepostal->execute(array($newcodepostal, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}

//Modification du profil (Ville)
	if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville']) {
		$newville = ucfirst($_POST['newville']);
		$insertville= $bdd->prepare("UPDATE clients SET ville = ? WHERE id_client = ?");
		$insertville->execute(array($newville, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}

//Modification du profil (Email)
	if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']) {
		$newemail = htmlspecialchars($_POST['newemail']);
		$insertemail = $bdd->prepare("UPDATE clients SET email = ? WHERE id_client = ?");
		$insertemail->execute(array($newemail, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
	}


	if(isset($_POST['newcontrat']) AND !empty($_POST['newcontrat']) AND $_POST['newcontrat'] != $reqtype1[$k]['type']) {
		$newcontrat = htmlspecialchars($_POST['newcontrat']);
		$insertemail = $bdd->prepare("UPDATE clients SET status = ? WHERE id_client = ?");
		$insertemail->execute(array($newcontrat, $_GET['id']));
		header('Location: profil.php?id='.$_GET['id']);
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
					<a href="espace_fpec.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-plus"></i> Fiche PEC </a>

						<a href="espace_materiel.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-plus"></i> Matériel </a>

					<div class='dashboard-nav-dropdown'>
						<a href="#"class="dashboard-nav-item dashboard-nav-dropdown-toggle">
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
								<a href="client_all.php" class="dashboard-nav-dropdown-item">TOUS</a>
								<a href="client_all.php" class="dashboard-nav-dropdown-item">PC FIXE</a>
								<a href="client_abonnée.php" class="dashboard-nav-dropdown-item">PC PORTABLE</a>
								<a href="client_noabonnée.php" class="dashboard-nav-dropdown-item">TABLETTE</a>
								<a href="client_noabonnée.php" class="dashboard-nav-dropdown-item">TÉLEPHONE</a>
							</div>
						</div>

						<a class="dashboard-nav-item active"><i class="fas fa-cogs"></i> Paramètre compte </a>

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
									<div class="container h-100">
										<div class="row justify-content-center align-items-center h-100">
											<div class="col-12 col-lg-9 col-xl-7">
												<div class="card-body p-4 p-md-5">
													<form method="post">
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Nom <label style="color:red">*</label></label>
																	<input type="text" disabled name="nom" value="<?php echo $user['nom'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Prénom <label style="color:red">*</label></label>
																	<input type="text" disabled name="prenom" value="<?php echo $user['prenom'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
														</div>

														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Numéro de téléphone <label style="color:red">*</label></label>
																	<input type="text" maxlength="10" value="<?php echo $user['telephone'] ?>" name="newtel" class="form-control form-control-lg"/>
																</div>

															</div>
															<div class="col-md-6 mb-4">
																<label class="form-label">Numéro de téléphone fixe</label>
																<input type="text" maxlength="10" value="<?php echo $user['telephone_fix'] ?>" name="newfix" class="form-control form-control-lg"/>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Adresse Mail</label>
																	<input type="email" name="newemail" value="<?php echo $user['email'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">

																<div class="form-outline">
																	<label class="form-label">Adresse Postal</label>
																	<input type="text" name="newadresse" value="<?php echo $user['adresse'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Code Postal</label>
																	<input type="text" name="newcodepostal" value="<?php echo $user['codepostal'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">

																<div class="form-outline">
																	<label class="form-label">Ville</label>
																	<input type="text" name="newville" value="<?php echo $user['ville'] ?>" class="form-control form-control-lg" />
																</div>
															</div>
															<div class="col-md-6 mb-4">
																<div class="form-outline">
																	<label class="form-label">Contrat</label>
																	<select class="form-select" name="newcontrat">
																		<option disabled selected value>-- Choisir le contrat --</option>
																		<?php
																		$reqtype = $bdd->prepare("SELECT DISTINCT * FROM contrat");
																		$reqtype->execute();

																		$reqtype1 = $reqtype->fetchAll();
																		foreach ($reqtype1 as $k => $v) {
																			$selected1 = !empty($_POST['contrat']) && $_POST['contrat'] == $reqtype1[$k]['type'] && $reqtype1[$k]['type'] ? 'selected' : ''; 
																			echo '<option value="' . $reqtype1[$k]['type'] . '"'.$selected1.'>' . $reqtype1[$k]['type'] . '</option>';
																		}
																	?></select>
																</div>
															</div>
															<div class="mx-auto text-center">
																<button class="btn btn-primary btn-lg"type="submit" />Effectuer le changement</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
						<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
						<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
						<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
						<script src="JS/accueil.js"></script>
						</html>
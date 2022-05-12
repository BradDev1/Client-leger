<?php
include 'config.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare("SELECT * FROM fiche_peg WHERE id_inter = ".$getid."");
	$requser->execute(array($getid));
	$user = $requser->fetch();

}

if(isset($_POST['retour'])) {
	header("Location: modifinterv.php?id=".$_GET['id']);
}

if(isset($_POST['supprimer'])) {

	$getnom = $user['nom'];
	$getprenom= $user['prenom'];
	$gettel = $user['telephone'];
	$requsers = $bdd->prepare("SELECT * FROM clients WHERE nom = ? and prenom = ? and telephone = ?");
	$requsers->execute(array($getnom,$getprenom,$gettel));
	$users = $requsers->fetch();

	$getid = intval($_GET['id']);
	$delete = $bdd->prepare("DELETE FROM fiche_peg WHERE id_inter = ".$getid."");
	$delete->execute(array($getid));
	header("Location: profil.php?id=".$users['id_client']);

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
	<div class='dashboard bg'>
		<div class="dashboard-nav bg-danger">
			<header class="bg-danger">
				<a class="menu-toggle"><i class="fas fa-bars"></i></a><a href="accueil.php" class="brand-logo"><img class="img-fluid" style="width:50px" src="IMG/logo/logo.png"></a></a></header>
				<nav class="dashboard-nav-list">

					<a href="modifinterv.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa fa-file" aria-hidden="true"></i> Fiche fpec
					</a>

					
					<a href="download.php?id=<?php echo $user['id_client'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-download"></i> Télécharger </a>


					<a href="devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item"><i class="fa-solid fa-calculator "></i> Devis </a>

					<a href="acceptation_devis.php?id=<?php echo $user['id_inter'] ?>" class="dashboard-nav-item "><i class="fa-solid fa-plus"></i> Acceptation devis </a>

					<a class="dashboard-nav-item active"><i class="fa-solid fa-trash"></i> Supprimer </a>

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
								<h3>Voulez vous supprimer cette fiche ?</h3>
							</div>
						</div>

						<div class='card-body'>						
							<h3 style="color:white;" class="mx-auto text-center card-header bg-danger"><i class="fa-solid fa-triangle-exclamation"></i> Suppression <i class="fa-solid fa-triangle-exclamation"></i></h3>
						</div>




						<div class="mx-auto text-center">
							<input class="btn btn-danger btn-lg mx-5" name="supprimer" type="submit" value="Oui" />
							<input class="btn btn-success btn-lg mx-5" name="retour" type="submit" value="Non" />
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